<?php

namespace App\Http\Controllers;

use App\Models\TasksList;
use Illuminate\Http\Request;

class TasksListController extends Controller
{
    function show(Request $req){
        if(!Auth::check()){
            return view('/home');
        }

        $list = TasksList::all();
        return view('/home',['list' => $list]);

    }
}
