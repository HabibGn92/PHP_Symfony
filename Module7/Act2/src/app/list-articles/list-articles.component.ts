import { Component, OnInit } from '@angular/core';
import { Article } from 'src/models/article.model';
import { ArticlesService } from '../services/articles.service';

@Component({
  selector: 'app-list-articles',
  templateUrl: './list-articles.component.html',
  styleUrls: ['./list-articles.component.scss']
})
export class ListArticlesComponent implements OnInit {

  articles!:Article[];

  constructor(private articleService:ArticlesService) { }

  ngOnInit(): void {
    this.articles = this.articleService.getArticles();
  }

}
