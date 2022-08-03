import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable()
export class AuthInterceptor implements HttpInterceptor {
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    
    let jwt = JSON.parse(localStorage.getItem('jwt') || '{}');
    if (jwt) {
        request = request.clone({
            setHeaders: {
                Authorization: `Bearer ${jwt.token}`
            }
        });
    }
    return next.handle(request);
  }
}