<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    function show(Request $req, TasksList $list){
        $this->authorize('list-access',[self::class, $list]);
        if(!$list){
            return redirect(route('home'));
        }
        $tasks = Task::
            where('list_id',$list->id)
            ->orderBy('created_at','desc')
            ->get();
        return view('list',['tasks' => $tasks, 'list' => $list]);
    }

    function add(Request $req,TasksList  $list){

        $this->authorize('list-access',[self::class, $list]);
        $validate = $req->validate([
            'task' => 'required'
        ]);
        $validate['list_id'] = $list->id;
        $validate['is_complete'] = false;
        $task = Task::create($validate);

        if($task){
            return redirect("/list/$list->id");
        }

        return redirect("/list/$list->id")->withErrors([
            'add' => 'Не удалось добавить задачу'
        ]);

    }

    function delete(Request $req,TasksList  $list){
        $this->authorize('list-access',[self::class, $list]);

        if($list){
            Task::where('id',$req['task_delete'])
                ->where('list_id',$list->id)
                ->delete();
        }

        return redirect("/list/$list->id");
    }

    function __construct(){
        $this->middleware('auth');
    }
}
