import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DataService, About } from '../../services/data.service';


@Component({
  selector: 'app-about',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './about.component.html',
  styleUrl: './about.component.scss',
  encapsulation: ViewEncapsulation.None

})
export class AboutComponent implements OnInit{
  
  about?: About;

  constructor(private dataService: DataService) { }

  ngOnInit(): void {
    this.loadAbout();
  }

  loadAbout(): void {

    this.dataService.getAbout().subscribe({
      next: (data: About[]) => {
        // Filter for active about records; assume only one active record is used
        const activeAbout = data.filter(b => b.status === 'Active');
        if (activeAbout.length > 0) {
          this.about = activeAbout[0];
        }
      },
      error: err => console.error('Error loading bio data', err)
    });
  }



}
