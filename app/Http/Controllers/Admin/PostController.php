<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
