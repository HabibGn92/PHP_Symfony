import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Article } from 'src/models/article.model';
import { ArticlesService } from '../services/articles.service';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-list-articles',
  templateUrl: './list-articles.component.html',
  styleUrls: ['./list-articles.component.scss']
})
export class ListArticlesComponent implements OnInit {

  articles$!:Observable<Article[]>;

  constructor(private articleService:ArticlesService,
              private authService:AuthService) { }

  ngOnInit(): void {
    this.articles$ = this.articleService.getArticles();
    this.articleService.notifyObservable$.subscribe(res => {
      if (res.refresh) {
        this.articles$ = this.articleService.getArticles();
      }
    })
  }

}
