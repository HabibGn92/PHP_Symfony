import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router } from '@angular/router';
import { JwtHelperService } from '@auth0/angular-jwt';
import jwtDecode from 'jwt-decode';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthGuardService implements CanActivate {

  constructor(public auth:AuthService,
              public router:Router,
              public jwtHelper : JwtHelperService) { }

  canActivate(route: ActivatedRouteSnapshot): boolean {

    const expectedRole = route.data.expectedRole;
    const token = JSON.parse(localStorage.getItem('jwt') || '{}').token;
    const tokenPayload = this.jwtHelper.decodeToken(token);
  
    if (!this.auth.isAuthenticated() || !tokenPayload.roles.includes(expectedRole)) {
      this.router.navigateByUrl('login');
      return false;
    }
    return true;
  }


}
