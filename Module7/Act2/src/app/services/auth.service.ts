import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { JwtHelperService } from '@auth0/angular-jwt';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

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


  isUser() : boolean {
    let token = JSON.parse(localStorage.getItem('jwt') || '{}').token;
    if(token){
      return this.jwtHelper.decodeToken(token).roles.includes('ROLE_USER');
    }
    return false;
  }

  isAdmin() : boolean {
    let token = JSON.parse(localStorage.getItem('jwt') || '{}').token;
    if(token){
      return this.jwtHelper.decodeToken(token).roles.includes('ROLE_ADMIN');
    }
    return false;
  }

  getUser() : void {
    let token = JSON.parse(localStorage.getItem('jwt') || '{}').token;
      let email = this.jwtHelper.decodeToken(token).username;
      this.http.get(`http://127.0.0.1:8000/api/user/${email}`).subscribe();
    }
  }

  





