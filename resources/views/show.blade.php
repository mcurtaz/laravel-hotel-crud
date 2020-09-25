@extends('layouts/main-layout')

@section('content')
    <div class="content">
        
        {{-- {{ json_encode($stanze) }}   per debug si può utilizzare un json_encode per visualizzare i dati in arrivo dalla compact del controller e farsi un'idea --}}
        
        <h2>Room:  {{ $stanza -> room_number }}</h2>

        <h3>Floor: {{ $stanza -> floor }}</h3>
        <h3>Beds: {{ $stanza -> beds }}</h3>
        
    </div>
@endsection