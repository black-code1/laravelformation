@extends('layouts.app')

@section('content')
    <h1>Creer un nouveau post</h1>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" class="border-gray-600 border-2">
        <textarea name="content" cols="30" rows="10" class="border-gray-600 border-2"></textarea>
        <p>Choose your monster's features:</p>

        <div>
        <input type="checkbox" id="scales" name="scales"
                checked>
        <label for="scales">Scales</label>
        </div>

        <div>
        <input type="checkbox" id="horns" name="horns">
        <label for="horns">Horns</label>
        </div>
        <label for="avatar">Choose a profile picture:</label>

        <input type="file"
            id="avatar" name="avatar"
            accept="image/png, image/jpeg">
        <button type="submit" class="bg-green-500">Creer</button>
    </form>
@endsection