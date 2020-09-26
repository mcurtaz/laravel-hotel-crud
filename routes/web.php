<?php

use Illuminate\Support\Facades\Route;

// Route per la lista delle stanze
Route::get('/', 'StanzeController@index') -> name('stanze-index');

// Route per la show (pagina che mostra i dati della singola stanza) 7{id} sarà di volta in volta l'id della stanza visualizzata (alla funzione show del controller andrà passato un argomento {id})
Route::get('/show/{id}', 'StanzeController@show') -> name('stanza-show');
