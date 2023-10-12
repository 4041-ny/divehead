<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TasklogController;


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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::post('/posts/', 'store')->name('store');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('posts/{post}','delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");
Route::get('/linelogin',[LineLoginController::class,'linelogin'])->name('linelogin');
Route::get('/callback', [LineLoginController::class,'callback'])->name('callback');
Route::resource('/items' ,  ItemsController::class);
Route::get('/graph', [TasklogController::class,"show"])->name("graph");




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
