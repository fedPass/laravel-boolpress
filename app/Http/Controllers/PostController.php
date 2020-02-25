<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts',['posts'=> $posts]);
    }

    public function show($slug)
    {   //uso first() per prendere un solo record già bello impacchettato
        $post = Post::where('slug', $slug)->first();
        if (!empty($post)) {
            return view('single-post',['post'=> $post]);
        } else {
            //altrimenti restituiscimi view 404
            return abort(404);
        }

    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        //se ho post da mostrare per questa categoria mostrali
        if(!empty($category)) {
            //recupero posts con questa categoria
            $post_category = $category->posts;
            return view('single-category',['posts'=> $post_category, 'category' => $category]);
        } else {
            //altrimenti restituiscimi view 404
            return abort(404);
        }

    }

    public function showTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        //se ho post da mostrare per questo tag mostrali
        if(!empty($tag)) {
            //recupero posts con questo tag
            $post_tag = $tag->posts;
            return view('single-tag',['posts'=> $post_tag, 'tag' => $tag]);
        } else {
            //altrimenti restituiscimi view 404
            return abort(404);
        }

    }
}
