<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLead;
use App\Mail\UserConfirmation;

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
        //invio mail all'admin passandogli dati di $new_message
        Mail::to('admin@sito.com')->send(new NewLead($new_message));
        //invio mail con copia messaggio all'user
        Mail::to($new_message->email)->send(new UserConfirmation($new_message));

        return redirect()->route('thanks');
    }

    public function thanks(){
        return view('thank-you');
    }
}
