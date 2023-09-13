<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/verifyLogin', [App\Http\Controllers\loginController::class, 'verifyCredential']);
Route::post('/registerUser', [App\Http\Controllers\registerController::class, 'registerUser']);

Route::get('/', function () {
    Auth::logout();
    return view('components.login');
})->name('login');

Route::get('/login', function () {
    Auth::logout();
    return view('components.login');
})->name('login');

Route::get('/verifyLogin', function () {
    Auth::logout();
    return redirect('/login');
})->name('verifyLogin');

Route::get('/register', function () {
    Auth::logout();
    return view('components.register');
})->name('register');

Route::get('/registerUser', function () {
    Auth::logout();
    return redirect('/register');
})->name('registerUser');



Route::middleware(['auth'])->group(function () {
    Route::get('/post', [App\Http\Controllers\postController::class, 'displayAllPosts']);
    Route::get('/my-post', [App\Http\Controllers\postController::class, 'displayMyPosts']);
    Route::get('/logout', [App\Http\Controllers\postController::class, 'logout'])->name('logout');

    Route::post('/createPost', [App\Http\Controllers\postController::class, 'createPost']);
    Route::post('/deletePostAdmin', [App\Http\Controllers\postController::class, 'deletePostAdmin']);
    Route::post('/updatePostAdmin', [App\Http\Controllers\postController::class, 'updatePostAdmin']);
    Route::post('/deleteMyPost', [App\Http\Controllers\postController::class, 'deleteMyPost']);
    Route::post('/updateMyPost', [App\Http\Controllers\postController::class, 'updateMyPost']);

    Route::get('/create-post', function () {
        return view('components.create-post');
    })->name('create-post');

    Route::get('/createPost', function () {
        return redirect('/create-post');
    })->name('createPost');

    Route::get('/deletePostAdmin', function () {
        return redirect('/post');
    })->name('deletePostAdmin');

    Route::get('/updatePostAdmin', function () {
        return redirect('/post');
    })->name('updatePostAdmin');

    Route::get('/deleteMyPost', function () {
        return redirect('/my-post');
    })->name('deleteMyPost');

    Route::get('/updateMyPost', function () {
        return redirect('/my-post');
    })->name('updateMyPost');

});
