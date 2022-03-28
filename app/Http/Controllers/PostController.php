<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
    //   $post = Post::find(1);
    //   $post->update([
    //       'title' => 'Titre edite'
    //     ]);
        
    //     dd('edite');

    $post = Post::find(12);
    $post->delete();

    dd('supprime !');
    
    $posts = Post::orderBy('title')->take(3)->get();

       
        
        return view('articles',[
            'posts' => $posts
        ]);
        
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        // $post = Post::where('title','Adipisci et sed voluptas eaque.')->firstOrFail();
        
        return view('article',[
            'post'=> $post
        ]);
    }

    public function create(){
     return view('form');   
    }

    public function store(Request $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        dd('Post cree !');
    }

    public function contact()
    {
        return view('contact');
    }
}
