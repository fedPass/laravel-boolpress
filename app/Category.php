<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //dichiaro che tipo di relazione c'è tra le tabelle
    //una categoria ha molti posts
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
