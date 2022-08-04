import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  firstName!:string;

  constructor(private authService:AuthService,
              private router:Router) { }

  ngOnInit(): void {
    this.authService.getUser();
   
  }

  onLogout() : void {
    localStorage.removeItem('jwt');
    this.router.navigateByUrl('login');
  }

  isLoggedIn() {
      return this.authService.isAuthenticated();
  }

  isUser() : boolean {
    return this.authService.isUser();
  }

  isAdmin() : boolean {
    return this.authService.isAdmin();
  }


}
