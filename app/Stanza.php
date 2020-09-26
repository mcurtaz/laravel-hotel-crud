<?php

namespace App; // questo namespace servirà nel controller per "importare" il model. con la riga use App\nomemodel

use Illuminate\Database\Eloquent\Model;

class Stanza extends Model
{

    // Il model non è altro che una specie di importazione di una tabella del databese. Una specie di rappresentazione esatta di UNA tabella del database all'interno dell'ecosistema laravel. Ogni model rappresenta una sola tabella. Con la variabile $table (che non è decisa dal developer ma è una variabile "specifica" di laravel) si fa corrispondere questo model con la tabella specifica 'stanze'. alla pagina https://laravel.com/docs/8.x/eloquent ci sono altri esempi livello base di altre variabili specifiche e i loro utilizzi nel model (per esempio per cambiare la chiave primaria della tabella che per laravel di default si chiama id ed è una chiave di tipo int oppure per togliere la chiavi che per laravel sono di default created_at e updated_at)
    protected $table = 'stanze';
}
