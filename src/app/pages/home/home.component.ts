import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule, Router } from '@angular/router';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
import { DataService, UserAuth} from '../../services/data.service';
import { v4 as uuidv4 } from 'uuid';
import * as CryptoJS from 'crypto-js';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule, RouterModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {

  showLogin = true;
  isLoginMode = true;
  user: UserAuth = { email: '', password: '' };
  errorMessage = '';
  currentUser: UserAuth = 
  { token: '', firstname: '', lastname: '', email: '', password: '', status: '', blocked: '' };


  constructor(private dataService: DataService, private router: Router) { }
  
  onSwitchMode() {
    this.isLoginMode = !this.isLoginMode;
    this.errorMessage = '';
  }


  onSubmit() {
    if (this.isLoginMode) {
      this.dataService.login(this.user).subscribe(response => {
        const loggedUser = response.user;
        if (loggedUser.status === 'Active' && loggedUser.blocked === 'N') {
          localStorage.setItem('token', response.token);
          localStorage.setItem('email', loggedUser.email);
          this.router.navigate(['/todo']);
        } else {
          this.errorMessage = "Your account is either inactive or blocked.";
        }
      }, error => {
        this.errorMessage = "Login failed: " + error.error;
      });
    } else {
      this.dataService.register(this.user).subscribe(response => {
        this.currentUser.token = uuidv4();
        this.currentUser.password = CryptoJS.MD5(this.user.password).toString();
        this.isLoginMode = true;
      }, error => {
        this.errorMessage = "Registration failed: " + error.error;
      });
    }
  }
  

}