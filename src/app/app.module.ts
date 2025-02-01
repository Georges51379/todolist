import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { NgModule} from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { DragDropModule } from '@angular/cdk/drag-drop';

// Components
import { NavbarComponent } from './components/navbar/navbar.component';
import { FooterComponent } from './components/footer/footer.component';
import { BacktotopComponent } from './components/backtotop/backtotop.component';
// Pages
import { HomeComponent } from './pages/home/home.component';
import { AppComponent } from './app.component';
import { TodoComponent } from './pages/todo/todo.component';

@NgModule({
  declarations: [
    
  ],
  imports: [
    BrowserModule,
    AppComponent,
    CommonModule,
    AppRoutingModule,
    RouterModule,
    HomeComponent,
    FormsModule,
    TodoComponent,
    DragDropModule,
    NavbarComponent,
    FooterComponent,
    BacktotopComponent
  ],
  providers: [],
  bootstrap: []
})
export class AppModule { }
