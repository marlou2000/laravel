@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="main-container">
   
        @if (session('error'))
            <div class="invalid-credential">
                {{ session('error') }}
            </div>
        @endif

        <form action="/verifyLogin" method="POST">
            @csrf
            <div style="width: 100%; text-align: center">
                <img src="{{ asset('img/logo.png') }}"/>
            </div>

            <hr style="margin-top: 20px; margin-bottom: 20px"/>

            <div>
                <label for="username">Username:</label>
                <input type="text" required name="username" id="username" placeholder="Username" />
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" required name="password" id="password" placeholder="Password" />
            </div>

            <button type="submit">Login</button>
        </form>
        <span style="font-size: 12px">Doesn't have an account yet? <a href="/register">Create account</a>
    </div>
@endsection