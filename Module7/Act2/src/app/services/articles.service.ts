import { Injectable } from '@angular/core';
import { Article } from 'src/models/article.model';

@Injectable({
  providedIn: 'root'
})
export class ArticlesService {

  articles: Article[] = [
    {
      id : 1,
      title : 'Angular 12 ',
      description : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      auteur : 'Habib',
      date : new Date('2020-05-01'),
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
      description : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      auteur : 'Mohamed',
      date : new Date('2018-05-01')
    },
    {
      id:3,
      title : 'JavaScript ',
      description : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et elit ut odio volutpat accumsan. Mauris bibendum quis erat aliquam laoreet. Cras porta risus vel sagittis aliquet. Praesent in ligula at mi efficitur hendrerit. Praesent porta erat eu justo mollis, ornare ullamcorper metus gravida. Phasellus iaculis quam vitae justo eleifend sodales. Vestibulum ut ante diam. Morbi sollicitudin sit amet arcu ut pharetra. Maecenas bibendum massa in lobortis scelerisque. Nulla sit amet mollis elit. Phasellus ut massa ut nisl pellentesque imperdiet.',
      auteur : 'Ali',
      date : new Date('2019-05-01')
    },
  ];

  constructor() { }

  getArticles() : Article[] {
    return this.sortArticles();
  }

  getArticleById(id:number) : Article {
    const article = this.articles.find( article => article.id === id );
    if (!article) {
      throw new Error('Article non trouvé');
    }else{
      return article;
    }
  }

  sortArticles(): Article[] {
    return this.articles.sort(function(a,b): any{
      return (b.date.getTime() - a.date.getTime());
      });
  }
}
