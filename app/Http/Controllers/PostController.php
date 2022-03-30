<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // $request->validate([
        //     'title'=>['required','max:255','min:5','unique:posts', new Uppercase],
        //     'content'=>['required']
        // ]);
        // Storage::disk('public')->put('avatars',$request->avatar);
        // $name = Storage::disk('local')->put('avatars',$request->avatar);

        // dd(Storage::get($name));
        // dd(Storage::disk('local')->exists($name));
        // return Storage::download($name);
        // dd(Storage::url($name));
        // dd(Storage::size($name));
        // dd(Storage::path($name));
        // dd(Storage::put('avatarstest', $request->avatar));
        // dd($request->file('avatar')->store('avatarstest2'));
        // dd($request->file('avatar')->storeAs('avatarstest2','test.jpg '));
        // dd($filename);
        $filename = time() . '.' . $request->avatar->extension();
        $path = $request->file('avatar')->storeAs('avatars',$filename, 'public');

       
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;

        $post->image()->save($image);//enregistre l'id du post de l'image

        dd('Post cree !');
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

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
        // dd($request->avatar->store('avatars'));
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
