import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm!:FormGroup;
  error!:boolean;

  constructor(private formBuilder:FormBuilder,
              private authService:AuthService,
              private router:Router) { }

  ngOnInit(): void {
    if (this.authService.isAuthenticated()) {
      this.router.navigateByUrl('');
    }

    this.loginForm = this.formBuilder.group({
      username:[null],
      password:[null]
    });
    this.error=false;
  }

  onLogin():void {
    this.authService.login(this.loginForm.value).subscribe(
      response => {
        if(response.token){
          localStorage.setItem('jwt', JSON.stringify(response));
          this.router.navigateByUrl('');
        } 
      },() => {
        this.error = true;
      }
    );
  }

}
