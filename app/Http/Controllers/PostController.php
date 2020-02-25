<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

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
}
