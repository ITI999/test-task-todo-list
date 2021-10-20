<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $formFields = $req->only(['email','password']);
        if(Auth::attempt($formFields)){
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors([
            'auth' => 'Не удалось авторизоваться'
        ]);
    }

    function register(Request $req){
        $validateFields = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:50'
        ]);

        if(User::where('email',$validateFields['email'])->exists()){
            return redirect(route('register'))->withErrors([
                'email' => 'Такой email уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);

        if($user){
            Auth::login($user);
            return redirect(route('home'));
        }

        return redirect(route('register'))->withErrors([
            'formError' => 'Произошла ошибка при добавлении нового пользователя'
        ]);
    }
}
