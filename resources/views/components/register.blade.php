@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="main-container">

        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @error('usernameExist')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @error('password')
            <div class="invalid-feedback">
                {{ $message }} 
            </div>
        @enderror

        @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @error('other')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <form action="/registerUser" method="POST">
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

            <div>
                <label for="password">Confirm Password:</label>
                <input type="password" required name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" />
            </div>

            <div>
                <label for="username">Role:</label>
                <select required name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <button type="submit">Register</button>
        </form>

        <span style="font-size: 12px">Already have an account? <a href="/login">Login</a>
    </div>
@endsection