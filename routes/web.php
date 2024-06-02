<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CommentController;
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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function(){
    return view('dashboard');
})->name('dashboard');

Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);
Route::get('/logout', [UserController::class, "logout"])->name('logout');
Route::get('/', [NoteController::class, 'index'])->name('notes');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/store', [NoteController::class, 'store'])->name('store');
    Route::put('/notes/{id}', [NoteController::class, 'update'])->name('updateNote');
    Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('deleteNote');

});


