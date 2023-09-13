@extends('layouts.dashboardLayout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/post.js') }}"></script>
@endsection

@section('content')
    @admin
        <div clas="modify-posts-container-btn">
            <button class="modify-posts-btn">Modify Posts</button>
        </div>

        <div class="modify-done-btn-container">
            <button class="modify-posts-done-btn">Done</button>
        </div>
        <br/><br/>
    @endadmin

        @foreach($posts as $post)
            <form class="form-post" id="form-post" method="POST">
            @csrf
            <div class="post-container">
                
                <input type="hidden" id="post_id" name="post_id" value="{{ $post-> id }}" />

                <div>
                    <h3 class="title">{{ $post-> title }}</h3>
                    <div class="owner-container">
                        <h4 class="h4-owner">Author: <span class="owner">{{ $post->user->username }}</span></h4>
                        <div class="modify-btn-container">
                            <button class="edit-post-btn">Edit</button>
                            <button class="delete-post-btn">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="body-container">
                    <textarea id="body" rows="5" name="body" cols="100" disabled value="{{ $post-> body }}" >{{ $post-> body }}</textarea>
                </div>
                <div class="dates-container">
                    <p class="date-posted">Date posted: {{  date('Y-m-d g:i a', strtotime($post-> created_at)) }}</p>
                    <p class="date-posted">Last update: {{  date('Y-m-d g:i a', strtotime($post-> updated_at)) }}</p>
                </div>

                <div class="save-cancel-btn-container">
                    <button type="submit" class="save-edit-btn">Save</button>
                    <button class="cancel-edit-btn">Cancel</button>
                </div>
            </div>

            <hr style="margin: 20px 0 20px 0" />
            </form>
        @endforeach
@endsection