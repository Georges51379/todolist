import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { NgModule} from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { RouterModule } from '@angular/router';

// Components
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { BacktotopComponent } from './components/backtotop/backtotop.component';
// Pages
import { HomeComponent } from './pages/home/home.component';
import { AppComponent } from './app.component';

@NgModule({
  declarations: [
  ],
  imports: [
    BrowserModule,
    CommonModule,
    AppRoutingModule,
    RouterModule,
    HomeComponent,
    NavbarComponent,
    FooterComponent,
    BacktotopComponent
  ],
  providers: [],
  bootstrap: []
})
export class AppModule { }
