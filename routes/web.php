<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FacebookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    
});

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

Route::delete('/user/destory/{id}', [UserController::class, 'destroy'])->name('user.destroy');



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/destory/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

 
Route::get('/userFacebook', [FacebookController::class, 'index'])->name('user.index');