<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'content', 'slug', 'cover_image'];

    //dichiaro che tipo di relazione c'è tra le tabelle
    //un post ha una sola categoria da cui quindi dipende
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
