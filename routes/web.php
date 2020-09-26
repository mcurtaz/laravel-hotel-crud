<?php

use Illuminate\Support\Facades\Route;

// Route per la lista delle stanze
Route::get('/', 'StanzeController@index') -> name('stanze-index');

// Route per la show (pagina che mostra i dati della singola stanza) 7{id} sarà di volta in volta l'id della stanza visualizzata (alla funzione show del controller andrà passato un argomento {id})
Route::get('/show/{id}', 'StanzeController@show') -> name('stanza-show');

// Questa route semplicemente porterà alla pagina con un form per creare una nuova stanza (inserire una nuova riga nel database alla tabella stanze)
Route::get('/create' , 'StanzeController@create') -> name('stanza-create-form');

// Questa route in post serve a mandare (appunto con metodo post) i dati del from nella pagina create.blade.php al controller che creerà attraverso il model un nuovo record di Stanza (una nuova riga nella tabella stanze). Da notare che l'url è lo stesso di stanza-create-form (/create) quello che cambia è il method che in questo caso è post. Quindi le due route puntano a due cose diverse e mettendo l'url nella barra del browser si utilizza per forza il get quindi "risponderà" la route in get che punta alla pagina col form
Route::post('/create', 'StanzeController@store') -> name('stanza-create-post');