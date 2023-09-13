@extends('layouts.dashboardLayout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
@endsection

@section('content')
    <div class="main-container-create-post">
        <h1 class="create-post-h1">Create Post</h1>
        <form action="/createPost" method="POST">
            @csrf

            <input type="hidden" name="owner" id="owner" value="1"/>

            <div>
                <label for="title">Title:</label>
                <input type="text" required name="title" id="title" placeholder="Title" />
            </div>

            <div class="textarea-container">
                <label for="body">Body:</label>
                <textarea name="body" id="body" cols="50" rows="10" placeholder="Body"></textarea>
            </div>

            <button type="submit">Post</button>
        </form>
    </div>
@endsection