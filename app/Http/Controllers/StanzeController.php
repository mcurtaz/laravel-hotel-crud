<?php

namespace App\Http\Controllers;

use App\Stanza; // con questa riga diciamo al controlle di utilizzare il model Stanza che si trova nel namespace App ATTENZIONE: anche se in questo caso namespace e nome della cartella corrispondono non sono la stessa cosa infatti per esempio si scrive con "\" e non con "/" (il namespace del model lo imposta automaticamente laravel quando crei un model con il comando php artisan make:model nomemodel e si trova scritto nel file del model alla riga namespase). Anche i "controller" risiedono in un namespace. In questo caso a riga 3 namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StanzeController extends Controller
{
    public function index(){
        // index restituisce la lista delle stanze. Prende dal model tutte le stanze e passa una collection (che è un oggetto "avanzato") alla view stanze.blade.php tramite la funzione compact (nella funzione compact quel 'stanze' sta per la variabile $stanze appena creata che prende dal model tutte le stanze con la funzione ::all() ). La view stanze.blade.php ciclerà con un foreach sulla collection stanze e stamperà la lista delle stanze. 

        $stanze = Stanza::all();

        // ATTENZIONE: in poche parole la funzione findOrFail crea una query cercando nell'id il valore corrispondente. In mysql sarebbe qualcosa del tipo SELECT * FROM Stanza. ovviamente tutto questo è gestito da laravel infatti la funzione è richiamata sul model non direttamente sul db. è tutto spiegato molto bene nella documentazione di laravel. ::All ::findOrFail e altre query base (oltre alla creazione base di model e controller) sono spiegate a questa pagina https://laravel.com/docs/8.x/eloquent



        return view('stanze', compact('stanze')); 

    }

    public function show($id){
        // la funzione show prende come argomento l'id che può arrivare qua al controller dal link nella pagina che lista le stanze. href="{{ route('stanza-show', $stanza -> id) }}" oppure dall'indirizzo url '/show/{id}'

        // La funzione findOrFail($id) cerca nel model Stanza il record nel database (la riga della tabella) con chiave primaria (che nel 99% dei casi è un valore int con nome id). trovata quella riga salva tutti i dati di quella specifica stanza nella variabile $stanza che con la funzione compact('stanza') verrà passata alla view show.blade.php che stamperà in pagina i dati di quella stanza. 
        $stanza = Stanza::findOrFail($id); 

        // ATTENZIONE: in poche parole la funzione findOrFail crea una query cercando nell'id il valore corrispondente. In mysql sarebbe qualcosa del tipo SELECT * FROM Stanza WHERE id = $id. ovviamente tutto questo è gestito da laravel attraverso controller e model. Si possono fare ovviamente ache altre query. è tutto spiegato molto bene nella documentazione di laravel. ::All ::findOrFail e altre query base sono spiegate a questa pagina https://laravel.com/docs/8.x/eloquent

        return view('show', compact('stanza'));
    }

    public function create(){

        // la route che chiama questa funzione semplicemente verrà restituita la pagina con il form per creare una nuova stanza
        return view('create');
    }

    public function store( Request $request){ // Request è una classe di default di laravel. nella variabile $request (questa la puoi chiamare come vuoi ma da best practice meglio chiamarla $request) viene creato un oggetto contenete tantissimi dati tra cui la maggior parte serve a laravel. tra questi contiene anche i dati compilati dall'utente nel form
        // dd($request); 
        // NOTE: dd() è una funzione che stampa in pagina l'argomento che gli passi. In questo caso $request. è una funzione utile in fase di debug tipo var_dump

        $data = $request -> all(); // l'oggetto $request che contiene molti dati (la maggior parte dei quali utili a laravel ma non significativi per il nostro obbiettivo) la funzione all() crea un oggetto con i dati del form più un altro paio di attributi che non serviranno.

        // dd($data);

        $stanza = Stanza::create($data); // Stanza::create() richiama nell'oggetto del model Stanza il metodo create che crea un nuovo report nel model (e quindi poi nel database mysql). gli passiamo la variabile $data che contiene i dati del form. di questi dati verranno presi solo quelli alle chiavi definite nella variabile $fillable del model.

        return redirect() -> route('stanze-index'); // redirect richiama la route con name 'stanze-index' quindi dopo aver inviato il form con submit viene richimata la view con la lista delle stanze
    }
}
