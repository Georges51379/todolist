import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { BacktotopComponent } from './components/backtotop/backtotop.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: true,
  imports: [
    RouterModule,
    NavbarComponent,
    CommonModule,
    FooterComponent,
    BacktotopComponent,
],
  styleUrls: ['./app.component.scss']
})
export class AppComponent {

}
