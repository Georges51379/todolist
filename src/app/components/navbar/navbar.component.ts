import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.scss'
})
export class NavbarComponent {
  menuOpen = false;
  isDarkMode: boolean = false;
  currentEmail: string = '';
  currentToken: string = '';

  constructor(private router: Router) {}

  logout(): void {
    // Clear admin session (remove stored admin data and token)
    localStorage.removeItem('email');
    localStorage.removeItem('token');
    // Clear component properties as well
    this.currentEmail = '';
    this.currentToken = '';
    // Redirect to the login page
    this.router.navigate(['/home']);
  }

  ngOnInit(): void {
    // Check localStorage for existing theme preference
    const savedTheme = localStorage.getItem('theme'); // 'dark' or 'light' (or null)
    
    // If 'dark' was saved, enable dark mode
    if (savedTheme === 'dark') {
      this.isDarkMode = true;
      document.body.classList.add('dark-theme');
    }
    // If 'light' or no preference, do nothing (remain in light mode)
  }


  toggleMenu() {
    this.menuOpen = !this.menuOpen;
  }

  closeMenu() {
    this.menuOpen = false;
  }

  toggleDarkMode() {
    this.isDarkMode = !this.isDarkMode;
    
    if (this.isDarkMode) {
      document.body.classList.add('dark-theme');
      localStorage.setItem('theme', 'dark');
    } else {
      document.body.classList.remove('dark-theme');
      localStorage.setItem('theme', 'light');
    }
  }
}