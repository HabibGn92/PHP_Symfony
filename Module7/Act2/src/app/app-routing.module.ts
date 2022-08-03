import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ArticleDetailComponent } from './article-detail/article-detail.component';
import { HomePageComponent } from './home-page/home-page.component';
import { ListArticlesComponent } from './list-articles/list-articles.component';
import { LoginComponent } from './login/login.component';
import { AuthGuardService as authGuard  } from './services/auth-guard.service';


const routes: Routes = [
  { path:'articles/:id' , component:ArticleDetailComponent },
  { path:'', component: HomePageComponent },
  { path:'articles', component: ListArticlesComponent, canActivate:[authGuard] },
  { path:'login', component: LoginComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
