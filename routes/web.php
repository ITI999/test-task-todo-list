<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'show'])->name('home');
Route::post('/', [HomeController::class,'add'])->middleware('auth');
Route::delete('/', [HomeController::class,'delete'])->middleware('auth');

Route::get('/home', [HomeController::class,'show']);

Route::get('/login',function (){
    if(Auth::check()){
        return redirect(route('home'));
    }
   return view('login');
})->name('login');
Route::post('/login',[UserController::class,'login']);

Route::get('/register',function (){
    if(Auth::check()){
        return redirect(route('home'));
    }
   return view('register');
})->name('register');
Route::post('/register',[UserController::class,'register']);

Route::get('/logout', function(){
    Auth::logout();
    return redirect(route('home'));
});

Route::get('/list/{list}',[ListController::class, 'show'])->name('list');
Route::post('/list/{list}',[ListController::class, 'add']);
Route::delete('/list/{list}',[ListController::class, 'delete']);

Route::post('/task/check/{task}',[TaskController::class,'check'])->name('check');

