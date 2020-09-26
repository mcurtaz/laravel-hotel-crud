@extends('layouts/main-layout')

@section('content')
<form action="{{ route('stanza-create-post') }}" method="post">
    <h2>Add a Room</h2>
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="number" name="room_number">
        </div>
        <div class="form-group">
            <label for="floor">Floor</label>
            <input type="number" name="floor">
        </div>
        <div class="form-group">
            <label for="beds">Beds</label>
            <input type="number" name="beds">
        </div>
        <button type="submit">Create</button>
   </form>
@endsection