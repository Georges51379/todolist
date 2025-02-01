import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { DragDropModule, CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, FormsModule, DragDropModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {

  showLogin = true;

  // Login form fields
  loginEmail: string = '';
  loginPassword: string = '';

  // Signup form fields
  signupFullName: string = '';
  signupEmail: string = '';
  signupPassword: string = '';
  signupConfirmPassword: string = '';

  toggleForm(): void {
    this.showLogin = !this.showLogin;
  }

  onLogin(): void {
    // Replace with your authentication logic
    console.log('Logging in with:', this.loginEmail, this.loginPassword);
    // Optionally clear fields after submission
    this.loginEmail = '';
    this.loginPassword = '';
  }

  onSignup(): void {
    // Replace with your sign-up logic
    if (this.signupPassword !== this.signupConfirmPassword) {
      alert('Passwords do not match!');
      return;
    }
    console.log('Signing up with:', this.signupFullName, this.signupEmail, this.signupPassword);
    // Optionally clear fields after submission
    this.signupFullName = '';
    this.signupEmail = '';
    this.signupPassword = '';
    this.signupConfirmPassword = '';
  }
}