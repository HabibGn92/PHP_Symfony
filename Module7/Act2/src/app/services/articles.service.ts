import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { Article } from 'src/models/article.model';
import { Commentaire } from 'src/models/commentaire.model';

@Injectable({
  providedIn: 'root'
})
export class ArticlesService {

  articles$!:Observable<Article[]>;
  notify = new BehaviorSubject<any>('');
  notifyObservable$ = this.notify.asObservable();



  constructor(private http:HttpClient) { }

  getArticles() : Observable<Article[]> {
    return this.http.get<Article[]>('http://127.0.0.1:8000/api/articles').pipe(
      map((articles) => this.sortArticles(articles) )
    );
  }

  getArticleById(id:number) : Observable<Article> {
    return this.http.get<Article>(`http://127.0.0.1:8000/api/article/${id}`);
  }

  sortArticles(articles: Article[]): Article[] {
    return articles.sort(function(a,b): any{
      return (new Date(b.created_at).getTime() - new Date(a.created_at).getTime());
      });
  }

  addArticle(formValue : {title : string, content: string, author: string, created_at: Date, commentaires?: Commentaire[]}):Observable<Article> {
    return this.http.post<Article>('http://127.0.0.1:8000/api/article',formValue);
  }

  public notifyOther(data: any) {
    if (data) {
        this.notify.next(data);
    }
  }
}
