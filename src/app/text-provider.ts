import {Injectable} from '@angular/core';
import {Http} from '@angular/http';
import {TextModel} from './text.model';
import 'rxjs/add/operator/map';

@Injectable()
export class TextProvider {

    private joke: TextModel = null;

    constructor(private http: Http) {

    }

    public getText(): TextModel {
        return this.joke;
    }

    load() {
        return new Promise((resolve, reject) => {
            this.http
                .get('http://wp.test/wp-json/admin/v1/translate/get')
                .map(res => res.json())
                .subscribe(response => {
                    this.joke = response;
                    console.log(this.joke )
                    resolve(true);
                })
        })
    }
}