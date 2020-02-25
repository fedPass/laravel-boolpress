<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //dichiaro che tipo di relazione c'è tra le tabelle
    //un tag può apparire su tanti posts (lo metto al plurale infatti)
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
