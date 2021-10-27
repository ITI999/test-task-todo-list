<?php

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

Route::get('/home', [ListController::class,'show']);
Route::get('/', [ListController::class,'show'])->name('home');
Route::post('/list/add',[ListController::class, 'add'])->middleware('auth');
Route::delete('/list/delete/{list}',[ListController::class, 'delete'])->middleware('auth');

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

Route::get('/list/{list}',[TaskController::class, 'show'])->name('list');
Route::post('/list/{list}/check/{task}',[TaskController::class,'check'])->name('check');
Route::post('/list/{list}/add',[TaskController::class,'add']);
Route::delete('/list/{list}/delete/{task}',[TaskController::class,'delete']);

