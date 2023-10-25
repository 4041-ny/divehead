<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TasklogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WebPushController;

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

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::post('/posts', 'store')->name('store');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('posts/{post}','delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::put('/posts/{post}', 'change')->name('change');
    
});
Route::get('/dashboard' ,[PostController::class, 'dashboard'])->name('dashboard');
Route::post('/completion/{post}' ,[PostController::class ,'completion'])->name("completion");

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::resource('/items' ,  ItemsController::class);
Route::post('items/{completions}',[ItemController::class ,'index'])->name("item");

Route::get('/linelogin',[LineLoginController::class,'linelogin'])->name('linelogin');
Route::get('/callback', [LineLoginController::class,'callback'])->name('callback');

Route::get('/calendar', [EventController::class, 'show'])->name("show");
Route::post('/calendar/create', [EventController::class, 'create'])->name("creation");
Route::post('/calendar/get',  [EventController::class, 'get'])->name("get");
Route::put('/calendar/update', [EventController::class, 'update'])->name("update");
Route::delete('/calendar/delete', [EventController::class, 'delete'])->name("delete"); 

Route::get('web_push/create', [WebPushController::class, 'create'])->name('create');
Route::post('web_push', [WebPushController::class, 'store'])->name('store');

// 全ユーザーにプッシュ通知
Route::get('web_push_test', function(){

    $users = \App\User::all();
    \Notification::send($users, new \App\Notifications\EventAdded());

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();



