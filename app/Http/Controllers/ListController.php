<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ListController extends Controller
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

    function delete(Request $req, TasksList $list){
        if($list->user_id == Auth::id()) {
            Task::where('list_id',$list->id)
                ->delete();
            $list->delete();
            return 'success';
        }
        return 'failed';
    }

    function add(Request $req){
        $rules = [
            'title' => 'required',
            'description' => ''
        ];
        $validator = Validator::make($req->all(),$rules);

        if($validator->fails()){
            return view('includes/errors',['errors' => $validator->getMessageBag()])->render();
        }
        $validateForm = $validator->validated();
        $validateForm['user_id'] = Auth::id();
        $list = TasksList::create($validateForm);
        if($list){
            return view('includes/listnode',['list' => $list])->render();
        }

        return view('includes/errors')->withErrors([
            'add' => 'Ошибка при добавлении списка'
        ]);
    }

}
