import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { JwtHelperService } from '@auth0/angular-jwt';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  

  constructor(private http:HttpClient,
              private jwtHelper:JwtHelperService) { }
  
  login(usercred:any):Observable<any> {
    return this.http.post<string>('http://127.0.0.1:8000/api/login_check',usercred);
  }

  public isAuthenticated() : boolean {
    let jwt = JSON.parse(localStorage.getItem('jwt') || '{}');
    return !this.jwtHelper.isTokenExpired(jwt.token);
  }





}