import { Component, Input, OnInit } from '@angular/core';
import { Article } from 'src/models/article.model';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.scss']
})
export class ArticleComponent implements OnInit {

  @Input() article!:Article;

  constructor() { }

  ngOnInit(): void {
  }

  onViewArticle():void{

  }

}
