import { Component, Input, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Article } from 'src/models/article.model';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.scss']
})
export class ArticleComponent implements OnInit {

  @Input() article!:Article;

  constructor(private router:Router) { }

  ngOnInit(): void {
  }

  onViewArticle(): void {
    this.router.navigateByUrl(`articles/${this.article.id}`);
  }

}
