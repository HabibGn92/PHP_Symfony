import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  isAuth!:boolean;

  constructor(private authService:AuthService,
              private router:Router) { }

  ngOnInit(): void {
    this.isAuth = this.authService.isAuthenticated();
  }

  onLogout() : void {
    localStorage.removeItem('jwt');
    this.router.navigateByUrl('login');
  }

  isLoggedIn() {
    return localStorage.getItem('jwt');
  }

}
