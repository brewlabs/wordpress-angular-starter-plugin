import { BrowserModule } from '@angular/platform-browser';
import { NgModule, APP_INITIALIZER } from '@angular/core';
import {TextProvider} from './text-provider';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';


export function textProviderFactory(provider: TextProvider) {
  return () => provider.load();
}

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpModule
  ],
  providers: [
  TextProvider, 
    { provide: APP_INITIALIZER, useFactory: textProviderFactory, deps: [TextProvider], multi: true }],
  bootstrap: [AppComponent]
})
export class AppModule { }
