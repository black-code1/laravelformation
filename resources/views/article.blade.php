@extends('layouts.app')

@section('content')
    <h1>{{ $post->content }}</h1> 
    <span>{{ $post->image ? $post->image->path : "pas d'image" }}</span>

    <hr>
    @forelse ($post->comments as $comment)
        <div>{{ $comment->content }} | cree le {{ $comment->created_at->format('d/m/Y') }}</div>
    @empty
        <span>Aucun commentaire pour ce post.</span>
    @endforelse
    <hr>
    @forelse ($post->tags as $tag)
        <span>{{ $tag->name }}</span>
    @empty
        <span>Aucun tags pour ce post.</span>
    @endforelse
@endsection