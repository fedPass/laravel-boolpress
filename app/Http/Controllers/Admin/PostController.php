<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',['posts'=> $posts]);
    }

    public function create()
    {
        //passo alla view le categorie per creare option della select dei generi
        $categories = Category::all();
        //passo i tag per creare chechbox
        $tags = Tag::all();
        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $dati = $request->all();
        $post = new Post();
        $post->fill($dati);
        //mi occupo dell'Immagine
        //se ho caricato qualcosa
        if(!empty($dati['cover_img'])) {
            //prendi il file
            $cover_img = $dati['cover_img'];
            //estraggo la path
            $cover_img_path = Storage::put('uploads', $cover_img);
            //salvo la path
            $post->cover_img = $cover_img_path;
        }
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
        //salvo il post nl db
        //devo prima salvare il post per potergli poi assegnare i tags
        $post->save();
        //se ho selezionato dei tag li assegno al post
        if (!empty($dati['tag_id'])) {
            //uso sync per popolare la tabella ponte (fill si riferisce alla tabella Post)
            //tags() è la funzione per la relazione che ho dichiarato nel Model Post
            $post->tags()->sync($dati['tag_id']);
        }
        //faccio redirect all'index
        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show',['post'=> $post]);
    }


    public function edit(Post $post)
    {
        //passo alla view le categorie per creare option della select dei generi
        $categories = Category::all();
        //mi passo i tags per creare checkbox
        $tags = Tag::all();
        return view('admin.posts.edit',['post'=> $post, 'categories' => $categories, 'tags' => $tags]);
    }


    public function update(Request $request, Post $post)
    {
        //recupero i dati del form
        $dati = $request->all();
        //gestisco immmagine da aggiornare
        // se ho caricato qualcosa adesso
        if (!empty($dati['cover_img_update'])) {
            //se ho già un'Immagine cancello quella precedente
            if (!empty($post->cover_img)) {
                Storage::delete($post->cover_img);
            }
            //carico la nuova Immagine
            $cover_img = $dati['cover_img_update'];
            $cover_img_path = Storage::put('uploads', $cover_img);
            // $dati['cover_img'] = $cover_img_path;
            $post->cover_img = $cover_img_path;
        }
        //aggiorno i dati
        $post->update($dati);
        //se ho selezionato dei tag li assegno al post
        if (!empty($dati['tag_id'])) {
            //uso sync per popolare la tabella ponte (fill si riferisce alla tabella Post)
            //tags() è la funzione per la relazione che ho dichiarato nel Model Post
            $post->tags()->sync($dati['tag_id']);
        }
        //ritorno alla lista dei post
        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        //cancello img dallo Storage quando cancello
        $img_post = $post->cover_img;
        Storage::delete($img_post);
        //cancello tag dal post per annullare la relazione tra le tabelle
        $post->tags()->sync([]);
        return redirect()->route('admin.posts.index');
    }
}
