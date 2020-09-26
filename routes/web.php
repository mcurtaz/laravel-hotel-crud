<?php

use Illuminate\Support\Facades\Route;

// Route per la lista delle stanze
Route::get('/', 'StanzeController@index') -> name('stanze-index');


// Route per la show (pagina che mostra i dati della singola stanza) 7{id} sarà di volta in volta l'id della stanza visualizzata (alla funzione show del controller andrà passato un argomento {id}). 

//NOTE: attenzione nel creare gli url, dovesse esserci per esempio un un'altra route con una pagina 'pippo.blade.php' con url /show/pippo lui cercherebbe la stanza con id pippo non la troverebbe e darebbe errore 404 pagina non trovata. Per ovviare in questo file web.php anndrebbe scritta prima la route con /show/pippo così se la trova la fa vedere se non la trova arriva a /show/{id} e cerca negli id delle stanze e mostra la view show.blade.php con la stanza di quell'id. 
Route::get('/show/{id}', 'StanzeController@show') -> name('stanza-show');

// Questa route semplicemente porterà alla pagina con un form per creare una nuova stanza (inserire una nuova riga nel database alla tabella stanze)
Route::get('/create' , 'StanzeController@create') -> name('stanza-create-form');

// Questa route in post serve a mandare (appunto con metodo post) i dati del form nella pagina create.blade.php al controller che creerà attraverso il model un nuovo record di Stanza (una nuova riga nella tabella stanze). Da notare che l'url è lo stesso di stanza-create-form (/create) quello che cambia è il method che in questo caso è post. Quindi le due route puntano a due cose diverse e mettendo l'url nella barra del browser si utilizza per forza il get quindi "risponderà" la route in get che punta alla pagina col form
Route::post('/create', 'StanzeController@store') -> name('stanza-create-post');