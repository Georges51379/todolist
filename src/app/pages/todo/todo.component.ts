import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';

interface Todo {
  id: number;
  title: string;
  deadline: string;  // ISO date string
  completed: boolean;
}


@Component({
  selector: 'app-todo',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule],
  templateUrl: './todo.component.html',
  styleUrl: './todo.component.scss'
})
export class TodoComponent {
  todos: Todo[] = [
    { id: 1, title: 'Finish Angular UI', deadline: '2025-12-31', completed: false },
    { id: 2, title: 'Write documentation', deadline: '2025-12-31', completed: false },
    { id: 3, title: 'Deploy app', deadline: '2025-12-31', completed: false }
  ];

  newTodoTitle: string = '';
  newTodoDeadline: string = '';

  addTodo(): void {
    if (!this.newTodoTitle || !this.newTodoDeadline) return;

    const newTodo: Todo = {
      id: Date.now(), // using timestamp as a unique id
      title: this.newTodoTitle,
      deadline: this.newTodoDeadline,
      completed: false
    };

    this.todos.push(newTodo);
    this.newTodoTitle = '';
    this.newTodoDeadline = '';
  }

  toggleCompleted(todo: Todo): void {
    todo.completed = !todo.completed;
  }

  drop(event: CdkDragDrop<Todo[]>): void {
    moveItemInArray(this.todos, event.previousIndex, event.currentIndex);
  }
}