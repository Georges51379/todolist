import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { DataService, Contact } from '../../services/data.service';


@Component({
  selector: 'app-contact',
  standalone: true,
  imports: [CommonModule, FormsModule, RouterModule],
  templateUrl: './contact.component.html',
  styleUrl: './contact.component.scss'
})
export class ContactComponent  implements OnInit {

  contact?: Contact;

  constructor(private dataService: DataService) { }

  ngOnInit(): void {
    this.loadContact();
  }

  loadContact(): void {
     this.dataService.getContact().subscribe({
          next: (data: Contact[]) => {
            // Filter for active about records; assume only one active record is used
            const activeContact = data.filter(b => b.status === 'Active');
            if (activeContact.length > 0) {
              this.contact = activeContact[0];
            }
          },
          error: err => console.error('Error loading contact data', err)
        });
  }


}