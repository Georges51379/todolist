import { Component, HostListener } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-backtotop',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './backtotop.component.html',
  styleUrl: './backtotop.component.scss'
})
export class BacktotopComponent {

  showButton = false;

  @HostListener('window:scroll')
  onScroll(): void {
    this.showButton = window.scrollY > 300;
  }

  scrollToTop(): void {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
}