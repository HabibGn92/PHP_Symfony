import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';
import { Article } from 'src/models/article.model';
import { ArticlesService } from '../services/articles.service';

@Component({
  selector: 'app-article-detail',
  templateUrl: './article-detail.component.html',
  styleUrls: ['./article-detail.component.scss']
})
export class ArticleDetailComponent implements OnInit {

  article$!:Observable<Article>;

  constructor(private articlesServices : ArticlesService,
              private route: ActivatedRoute) { }

  ngOnInit(): void {
    this.article$ = this.articlesServices.getArticleById(+this.route.snapshot.params['id']);
    // const articleId = +this.route.snapshot.params['id'];
  }

}
