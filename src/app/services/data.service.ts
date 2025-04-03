import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface UserAuth {
    token?: string;
    firstname?: string;
    lastname?: string;
    email: string;
    password: string;
    status?: string;
    blocked?: string;
  }

export interface About {
    token?: string;
    title: string;
    description: string;
    image_loc?: string;
    status: string;
    name: string;
    role: string;
    createDate?: string;
    updateDate?: string;
  }

  export interface Contact {
    token?: string;
    title: string;
    description: string;
    phonelink: string;
    emaillink: string;
    status: string;
    createDate?: string;
    updateDate?: string;
  }

  @Injectable({
    providedIn: 'root'
  })
  export class DataService {
  
    private aboutApiUrl = 'http://localhost:8080/api/about';
    private contactApiUrl = 'http://localhost:8080/api/contact';
    private userApiUrl = 'http://localhost:8080/api/auth2';

    constructor(private http: HttpClient) { }

    getAbout(): Observable<About[]> {
        return this.http.get<About[]>(this.aboutApiUrl);
    }

    getContact(): Observable<Contact[]> {
        return this.http.get<Contact[]>(this.contactApiUrl);
    }

    register(user: UserAuth): Observable<UserAuth> {
        return this.http.post<UserAuth>(`${this.userApiUrl}/register`, user);
      }
    
      login(user: UserAuth): Observable<any> {
        return this.http.post<any>(`${this.userApiUrl}/login`, user);
      }


}