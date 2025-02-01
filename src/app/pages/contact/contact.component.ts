import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-contact',
  standalone: true,
  imports: [CommonModule, FormsModule, RouterModule],
  templateUrl: './contact.component.html',
  styleUrl: './contact.component.scss'
})
export class ContactComponent {

  name: string = '';
  email: string = '';
  message: string = '';

  onSubmit(): void {
    // Replace this with your form handling logic
    console.log('Contact Form Submitted:', this.name, this.email, this.message);
    // Clear form fields or show a success message
    this.name = '';
    this.email = '';
    this.message = '';
  }
}