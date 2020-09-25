<?php

namespace App\Http\Controllers;

use App\Stanza;

use Illuminate\Http\Request;

class StanzeController extends Controller
{
    public function index(){

        $stanze = Stanza::all();

        return view('stanze', compact('stanze')); 

    }

    public function show($id){

        $stanza = Stanza::findOrFail($id);

        return view('show', compact('stanza'));
    }
}
