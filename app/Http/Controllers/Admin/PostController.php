<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',['posts'=> $posts]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $dati = $request->all();
        $post = new Post();
        $post->fill($dati);
        //creo lo slug
        $slug_originale = Str::slug($dati['title']);
        //lo salvo in una variabile
        $slug = $slug_originale;
        //verifico se esiste già uno Slug uguale
        $check_slug = Post::where('slug',$slug)->first();
        //se esiste dovrò agg "indice" 1
        $slug_trovati = 1;
        // se hai trovato uno slug uguale
        while (!empty($check_slug)) {
            //aggiungo allo slug originale il numero contatore
            $slug = $slug_originale . '-' . $slug_trovati;
            //verifico se esiste lo slug con questo "indice"
            $check_slug = Post::where('slug',$slug)->first();
            //incremento indice da unire allo slug
            $slug_trovati++;
        }
        $post->slug = $slug;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show',['post'=> $post]);
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit',['post'=> $post]);
    }


    public function update(Request $request, Post $post)
    {
        $dati = $request->all();
        $post->update($dati);
        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        //
    }
}
