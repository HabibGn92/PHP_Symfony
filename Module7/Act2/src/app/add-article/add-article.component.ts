import { Component, OnInit } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, ValidationErrors, ValidatorFn, Validators } from '@angular/forms';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { Article } from 'src/models/article.model';
import { ArticlesService } from '../services/articles.service';

@Component({
  selector: 'app-add-article',
  templateUrl: './add-article.component.html',
  styleUrls: ['./add-article.component.scss']
})
export class AddArticleComponent implements OnInit {

  articleForm!:FormGroup; 
  articlePreview$!:Observable<Article>

  constructor(private formBuilder: FormBuilder,
              private articleService : ArticlesService) { }

  ngOnInit(): void {
    this.articleForm = this.formBuilder.group({
      title: [null, Validators.required],
      content: [null, Validators.required],
      author: [null],
      created_at: [new Date(), this.dateValidator()]
    });

    this.articlePreview$ = this.articleForm.valueChanges.pipe(
      map(formValue => ({
        ...formValue,
        id:0
      }))
    );
  }

  onSubmitForm() {
    this.articleService.addArticle(this.articleForm.value);
  }

  dateValidator() : ValidatorFn{
    return (control:AbstractControl) : {[key: string]: any} | null => {
      
      const currentDate = new Date();

      if(!control.value) {
        return null;
      }

      return new Date(control.value).getTime() > currentDate.getTime() 
      ? null
      : {invalidDate: 'You cannot use future dates' } ;
    }
  }


}
