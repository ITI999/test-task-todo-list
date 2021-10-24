<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function show(Request $req){
        if(!Auth::check()){
            return view('home');
        }
        $lists = TasksList::where('user_id',Auth::id())
            ->orderBy('created_at','desc')
            ->get();
        return view('/home',['lists' => $lists]);
    }

    function add(Request $req){
        $validateForm = $req->validate([
            'title' => 'required',
            'description' => ''
        ]);
        $validateForm['user_id'] = Auth::id();
        $list = TasksList::create($validateForm);

        if($list){
            return redirect(route('home'));
        }

        return redirect(route('home'))->withErrors([
            'add' => 'Ошибка при добавлении списка'
        ]);
    }

    function delete(Request $req){
        $list = TasksList::where('user_id',Auth::id())
            ->where('id',$req['list_delete'])
            ->get();
        if($list) {
            Task::where('list_id',$list[0]->id)
                ->delete();
            $list[0]->delete();
        }
        return redirect(route('home'));
    }
}
