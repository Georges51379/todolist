import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Todo {
    token?: string;
    email: string;
    todo: string;
    duedate: string; // ISO date string
    status: string;  // "Active" or "Inactive"
    done: string;    // "Y" or "N"
    createDate?: string;
    updateDate?: string;
  }
  

@Injectable({
  providedIn: 'root'
})
export class TodoService {
  private apiUrl = 'http://localhost:8080/api/todo';

  constructor(private http: HttpClient) { }

  private getAuthHeaders(): HttpHeaders {
    const token = localStorage.getItem('token');
    return token ? new HttpHeaders({ 'Authorization': `Bearer ${token}` }) : new HttpHeaders();
  }

  // Get todos for the signed-in user using their email from localStorage.
  getTodosByEmail(email: string): Observable<Todo[]> {
    return this.http.get<Todo[]>(`${this.apiUrl}?email=${email}`, { headers: this.getAuthHeaders() });
  }

  create(todo: Todo): Observable<Todo> {
    return this.http.post<Todo>(this.apiUrl, todo, { headers: this.getAuthHeaders() });
  }

  update(token: string, todo: Todo): Observable<Todo> {
    return this.http.put<Todo>(`${this.apiUrl}/${token}`, todo, { headers: this.getAuthHeaders() });
  }

  delete(token: string): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${token}`, { headers: this.getAuthHeaders() });
  }
}
