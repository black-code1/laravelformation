<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
  
    $posts = Post::all();
    $video = Video::find(1);
 
        return view('articles',[
            'posts' => $posts,
            'video' => $video
        ]);

          //   $post = Post::find(1);
    //   $post->update([
    //       'title' => 'Titre edite'
    //     ]);
        
    //     dd('edite');

    // $post = Post::find(12);
    // $post->delete();

    // dd('supprime !');

    // $posts = Post::orderBy('title')->take(3)->get();
        
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
        // dd($request->input('title'));
        // dd($request->is('posts/create'));
        // dd($request->routeIs('posts.store'));
        // dd($request->url());
        // dd($request->fullUrl());
        // dd($request->fullUrlWithQuery(['name' => '123456']));
        // dd($request->method());
        // dd($request->isMethod('POST'));
        // dd($request->all());
        // dd($request->input('_token'));
        // dd($request->input('test','default'));
        // dd($request->boolean('scales'), $request->boolean('horns'));
        // dd($request->only('_token'));
        // dd($request->only(['_token','scales']));
        // dd($request->except(['_token']));
        // dd($request->file('avatar'));
        // dd($request->avatar);
        // dd($request->avatar->extension());
        dd($request->avatar->store('avatars'));













        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);



        // dd('Post cree !');
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
        $post = Post::find(11);
        $video = Video::find(1);


        $comment1 = new Comment(['content'=> 'Mon premier commentaire']);
        $comment2 = new Comment(['content'=> 'Mon deuxieme commentaire']);
        $post->comments()->saveMany([
            $comment1,
            $comment2
        ]);

        $comment3 = new Comment(['content'=> 'Mon troisieme commentaire']);
        $video->comments()->save($comment3);
    }
}
