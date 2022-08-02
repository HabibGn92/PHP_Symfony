import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private token$! : Observable<string>;

  constructor(private http:HttpClient) { }
  
  getToken(): Observable<string>{
    return this.http.post<string>('http://127.0.0.1:8000/api/login_check',{username: "admin@talan.com",password:"admin123"});
  }
}