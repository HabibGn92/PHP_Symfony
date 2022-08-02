import { Commentaire } from "./commentaire.model";

export class Article {
    id!:number;
    title!:string;
    content!:string;
    author!:string;
    created_at!: Date;
    commentaires?:Commentaire[];
}