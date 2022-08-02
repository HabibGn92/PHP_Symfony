import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Article } from 'src/models/article.model';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.scss']
})
export class ArticleComponent implements OnInit {

  @Input() article!:Article;
           token$!:Observable<string>;

  constructor(private router:Router,
              private authService:AuthService) { }

  ngOnInit(): void {
    this.token$ = this.authService.getToken();
  }

  onViewArticle(): void {
    this.router.navigateByUrl(`articles/${this.article.id}`);
  }

}
