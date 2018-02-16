import { Component } from '@angular/core';
import { TextProvider } from './text-provider';
import { TextModel } from './text.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Awesomeness';
  textModel: TextModel;
  
  constructor(textProvider: TextProvider) {
    this.textModel = textProvider.getText();
    console.log('app ish' );
    console.log(this.textModel['Dashboard'] );
  }

}
