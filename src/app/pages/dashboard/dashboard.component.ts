import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TodoService, Todo } from '../../services/todo.service';
import { NoteService, Note } from '../../services/note.service';

@Component({
  selector: 'app-dashboard',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {
  totalTodos = 0;
  doneTodos = 0;
  notDoneTodos = 0;

  totalNotes = 0;
  doneNotes = 0;
  notDoneNotes = 0;

  constructor(private todoService: TodoService, private noteService: NoteService) {}

  ngOnInit(): void {
    const email = localStorage.getItem('email');
    if (email) {
      this.todoService.getTodosByEmail(email).subscribe({
        next: (todos: Todo[]) => {
          // Filter to show only active todos
          const activeTodos = todos.filter(todo => todo.status === 'Active');
          this.totalTodos = activeTodos.length;
          this.doneTodos = activeTodos.filter(todo => todo.done === 'Y').length;
          this.notDoneTodos = activeTodos.filter(todo => todo.done === 'N').length;
        },
        error: (err) => console.error('Error loading todos for dashboard', err)
      });
      
      this.noteService.getNotesByEmail(email).subscribe({
        next: (notes: Note[]) => {
          const activeNotes = notes.filter(note => note.status === 'Active');
          this.totalNotes = activeNotes.length;
          this.doneNotes = activeNotes.filter(note => note.done === 'Y').length;
          this.notDoneNotes = activeNotes.filter(note => note.done === 'N').length;
        },
        error: (err) => console.error('Error loading notes for dashboard', err)
      });
    }
  }
}
