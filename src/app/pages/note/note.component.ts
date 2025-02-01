import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';

interface Note {
  id: number;
  title: string;
  content: string;
  deadline: string;  // ISO date string format
  completed: boolean;
}

@Component({
  selector: 'app-note',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule],
  templateUrl: './note.component.html',
  styleUrl: './note.component.scss'
})
export class NoteComponent {
  // Initial notes
  notes: Note[] = [
    {
      id: 1,
      title: 'Meeting Notes',
      content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
      deadline: '2025-12-31',
      completed: false
    },
    {
      id: 2,
      title: 'Shopping List',
      content: 'Milk, Eggs, Bread, Coffee.',
      deadline: '2025-12-31',
      completed: false
    },
    {
      id: 3,
      title: 'Random Ideas',
      content: 'Build a new productivity app, blog about Angular tips...',
      deadline: '2025-12-31',
      completed: false
    }
  ];

  // New note form fields
  newNoteTitle: string = '';
  newNoteContent: string = '';
  newNoteDeadline: string = '';

  addNote(): void {
    if (!this.newNoteTitle || !this.newNoteContent || !this.newNoteDeadline) {
      return;
    }

    const newNote: Note = {
      id: Date.now(), // Simple unique ID based on timestamp
      title: this.newNoteTitle,
      content: this.newNoteContent,
      deadline: this.newNoteDeadline,
      completed: false
    };

    this.notes.push(newNote);

    // Clear form fields after submission
    this.newNoteTitle = '';
    this.newNoteContent = '';
    this.newNoteDeadline = '';
  }

  toggleCompleted(note: Note): void {
    note.completed = !note.completed;
  }

  drop(event: CdkDragDrop<Note[]>): void {
    moveItemInArray(this.notes, event.previousIndex, event.currentIndex);
  }
}