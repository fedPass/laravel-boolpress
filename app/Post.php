<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'content', 'slug', 'cover_image', 'category_id'];

    //dichiaro che tipo di relazione c'è tra le tabelle
    //un post ha una sola categoria da cui quindi dipende
    public function category() {
        return $this->belongsTo('App\Category');
    }

    //un post può avere tanti tags (lo metto al plurale infatti)
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
