@extends('layouts/main-layout')

@section('content')
    <div class="content">
        
        {{-- {{ json_encode($stanze) }}   per debug si può utilizzare un json_encode per visualizzare i dati in arrivo dalla compact del controller e farsi un'idea --}}
        
        <h2>Rooms List</h2>

        <ul>
            @foreach ($stanze as $stanza)
                <li>
                    <a href="{{ route('stanza-show', $stanza -> id)}}">
                        <strong>Room Number:</strong> {{ $stanza -> room_number}}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection