import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Article } from 'src/models/article.model';
import { Commentaire } from 'src/models/commentaire.model';

@Injectable({
  providedIn: 'root'
})
export class ArticlesService {

  articles$!:Observable<Article[]>;
  articles: Article[] = [
    {
      id : 1,
      title : 'Angular 12 ',
      content : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      author : 'Habib',
      created_at : new Date('2020-05-01'),
      commentaires: [
        {
          id: 1,
          content : 'excellent article',
          auteur : 'sami',
          date: new Date('2021-06-02')
        },
        {
          id: 2,
          content : 'article intéressant',
          auteur : 'mohamed',
          date: new Date('2021-09-08')
        },
      ]
    },
    {
      id:2,
      title : 'TypeScript ',
      content : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      author : 'Mohamed',
      created_at : new Date('2018-05-01')
    },
    {
      id:3,
      title : 'JavaScript ',
      content : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      author : 'Ali',
      created_at : new Date('2019-05-01')
    },
  ];

  constructor(private http:HttpClient) { }

  getArticles() : Observable<Article[]> {
    return this.http.get<Article[]>('http://127.0.0.1:8000/api/articles');
  }

  getArticleById(id:number) : Observable<Article> {
    return this.http.get<Article>(`http://127.0.0.1:8000/api/article/${id}`);
  }

  sortArticles(): Article[] {
    return this.articles.sort(function(a,b): any{
      return (b.created_at.getTime() - a.created_at.getTime());
      });
  }

  addArticle(formValue : {title : string, content: string, author: string, created_at: Date, commentaires?: Commentaire[]}):void {

    const article = {
      ...formValue,
      id : this.articles[this.articles.length - 1].id + 1
    }
    this.http.post<Article>('http://127.0.0.1:8000/api/article',article).subscribe();
  }
}
