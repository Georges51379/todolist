import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Note {
    token?: string;
    email: string;
    title: string;
    content: string;
    duedate: string; // ISO date string
    status: string;  // "Active" or "Inactive"
    done: string;    // "Y" or "N"
    createDate?: string;
    updateDate?: string;
  }
  

@Injectable({
  providedIn: 'root'
})
export class NoteService {
  private apiUrl = 'http://localhost:8080/api/note';

  constructor(private http: HttpClient) { }

  private getAuthHeaders(): HttpHeaders {
    const token = localStorage.getItem('token');
    return token ? new HttpHeaders({ 'Authorization': `Bearer ${token}` }) : new HttpHeaders();
  }

  // Get notes for a given email
  getNotesByEmail(email: string): Observable<Note[]> {
    return this.http.get<Note[]>(`${this.apiUrl}?email=${email}`, { headers: this.getAuthHeaders() });
  }

  create(note: Note): Observable<Note> {
    return this.http.post<Note>(this.apiUrl, note, { headers: this.getAuthHeaders() });
  }

  update(token: string, note: Note): Observable<Note> {
    return this.http.put<Note>(`${this.apiUrl}/${token}`, note, { headers: this.getAuthHeaders() });
  }

  delete(token: string): Observable<any> {
    return this.http.delete(`${this.apiUrl}/${token}`, { headers: this.getAuthHeaders() });
  }
}
