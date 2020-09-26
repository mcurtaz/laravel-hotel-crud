@extends('layouts/main-layout')

@section('content')
    <div class="content">
        
        {{-- {{ json_encode($stanze) }}   per debug si può utilizzare un json_encode per visualizzare i dati in arrivo dalla compact del controller e farsi un'idea --}}
        
        <h2>Rooms List</h2>

        <ul>
            @foreach ($stanze as $stanza)
                <li>
                    {{-- cliccando sul li ci sarà un link che punta alla route stanza-show. passando al controller l'id della stanza. il controller cercherà nel model delle stanze la stanza con quell'id e passerà alla view show.blade.php i dati di quella specifica stanza con quell'id --}}
                    <a href="{{ route('stanza-show', $stanza -> id)}}"> 
                        <strong>Room Number:</strong> {{ $stanza -> room_number}}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection