import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { TodoService, Todo } from '../../services/todo.service';
import { v4 as uuidv4 } from 'uuid';



@Component({
  selector: 'app-todo',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule],
  templateUrl: './todo.component.html',
  styleUrls: ['./todo.component.scss']
})
export class TodoComponent implements OnInit {
  todos: Todo[] = [];
  // Form fields for new/edit todo
  newTodoTitle: string = '';
  newTodoDeadline: string = '';
  // Hold the todo being edited (null when adding new)
  editingTodo: Todo | null = null;

  constructor(private todoService: TodoService) { }

  ngOnInit(): void {
    const email = localStorage.getItem('email');
    if (email) {
      this.loadTodos(email);
    }
  }

  loadTodos(email: string): void {
    this.todoService.getTodosByEmail(email).subscribe({
      next: (data) => {
        // Only display todos with status "Active"
        this.todos = data.filter(todo => todo.status === 'Active');
      },
      error: (err) => console.error('Error loading todos', err)
    });
  }

  // Called when the form is submitted
  addOrUpdateTodo(): void {
    const email = localStorage.getItem('email');
    if (!email) return; // user not logged in

    if (this.editingTodo) {
      // Update the existing todo with new values
      this.editingTodo.todo = this.newTodoTitle;
      this.editingTodo.duedate = this.newTodoDeadline;
      this.todoService.update(this.editingTodo.token!, this.editingTodo).subscribe({
        next: () => {
          this.loadTodos(email);
          this.resetForm();
        },
        error: (err) => console.error('Error updating todo', err)
      });
    } else {
      // Create a new todo
      const newTodo: Todo = {
        token: uuidv4(),
        email: email,
        todo: this.newTodoTitle,
        duedate: this.newTodoDeadline,
        status: 'Active',
        done: 'N'
      };
      this.todoService.create(newTodo).subscribe({
        next: (createdTodo) => {
          this.todos.push(createdTodo);
          this.resetForm();
        },
        error: (err) => console.error('Error creating todo', err)
      });
    }
  }

  // Populate the form for editing
  editTodo(todo: Todo): void {
    this.editingTodo = { ...todo };
    this.newTodoTitle = todo.todo;
    this.newTodoDeadline = todo.duedate;
  }

  // Call backend to update status to "Inactive" (soft delete)
  deleteTodo(token?: string): void {
    if (!token) return;
    this.todoService.delete(token).subscribe({
      next: () => {
        this.todos = this.todos.filter(t => t.token !== token);
      },
      error: (err) => console.error('Error deleting todo', err)
    });
  }

  // Toggle the "done" status of a todo
  toggleCompleted(todo: Todo): void {
    todo.done = (todo.done === 'Y') ? 'N' : 'Y';
    if (todo.token) {
      this.todoService.update(todo.token, todo).subscribe({
        next: () => {},
        error: (err) => console.error('Error updating todo', err)
      });
    }
  }

  // Drag and drop reorder
  drop(event: CdkDragDrop<Todo[]>): void {
    moveItemInArray(this.todos, event.previousIndex, event.currentIndex);
    // Optionally, send updated order to backend.
  }

  resetForm(): void {
    this.newTodoTitle = '';
    this.newTodoDeadline = '';
    this.editingTodo = null;
  }
}
