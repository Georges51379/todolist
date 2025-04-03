import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { NoteService, Note } from '../../services/note.service';
import { v4 as uuidv4 } from 'uuid';

@Component({
  selector: 'app-note',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule],
  templateUrl: './note.component.html',
  styleUrls: ['./note.component.scss']  // Note: ensure the property is "styleUrls"
})
export class NoteComponent implements OnInit {
  notes: Note[] = [];
  newNoteTitle: string = '';
  newNoteContent: string = '';
  newNoteDeadline: string = '';
  editingNote: Note | null = null;

  constructor(private noteService: NoteService) { }

  ngOnInit(): void {
    const email = localStorage.getItem('email');
    if (email) {
      this.loadNotes(email);
    }
  }

  loadNotes(email: string): void {
    this.noteService.getNotesByEmail(email).subscribe({
      next: (data) => {
        // Only display notes with status "Active"
        this.notes = data.filter(note => note.status === 'Active');
      },
      error: (err) => console.error('Error loading notes', err)
    });
  }

  addOrUpdateNote(): void {
    const email = localStorage.getItem('email');
    if (!email) return;

    if (this.editingNote) {
      // Update the existing note with new values
      this.editingNote.title = this.newNoteTitle;
      this.editingNote.content = this.newNoteContent;
      this.editingNote.duedate = this.newNoteDeadline;
      this.noteService.update(this.editingNote.token!, this.editingNote).subscribe({
        next: () => {
          this.loadNotes(email);
          this.resetForm();
        },
        error: (err) => console.error('Error updating note', err)
      });
    } else {
      // Create a new note with a generated token
      const newNote: Note = {
        token: uuidv4(),
        email: email,
        title: this.newNoteTitle,
        content: this.newNoteContent,
        duedate: this.newNoteDeadline,
        status: 'Active',
        done: 'N'
      };
      this.noteService.create(newNote).subscribe({
        next: (createdNote) => {
          this.notes.push(createdNote);
          this.resetForm();
        },
        error: (err) => console.error('Error creating note', err)
      });
    }
  }

  editNote(note: Note): void {
    this.editingNote = { ...note };
    this.newNoteTitle = note.title;
    this.newNoteContent = note.content;
    this.newNoteDeadline = note.duedate;
  }

  deleteNote(token?: string): void {
    if (!token) return;
    this.noteService.delete(token).subscribe({
      next: () => {
        this.notes = this.notes.filter(n => n.token !== token);
      },
      error: (err) => console.error('Error deleting note', err)
    });
  }

  toggleCompleted(note: Note): void {
    // Toggle the done flag between 'Y' and 'N'
    note.done = (note.done === 'Y') ? 'N' : 'Y';
    if (note.token) {
      this.noteService.update(note.token, note).subscribe({
        next: () => {},
        error: (err) => console.error('Error updating note', err)
      });
    }
  }

  drop(event: CdkDragDrop<Note[]>): void {
    moveItemInArray(this.notes, event.previousIndex, event.currentIndex);
    // Optionally, update order on the backend.
  }

  resetForm(): void {
    this.newNoteTitle = '';
    this.newNoteContent = '';
    this.newNoteDeadline = '';
    this.editingNote = null;
  }
}
