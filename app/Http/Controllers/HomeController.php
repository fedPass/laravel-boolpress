<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function contatti(){
        return view('contatti');
    }

    public function contattiStore(Request $request){
        $dati = $request->all();
        $new_message = new Lead();
        $new_message->fill($dati);
        $new_message->save();
        return redirect()->route('thanks');
    }

    public function thanks(){
        return view('thank-you');
    }
}
