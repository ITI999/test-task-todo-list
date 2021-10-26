<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TasksList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
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

        $rules = [
            'task' => 'required'
        ];
        $validator = Validator::make($req->all(),$rules);

        if($validator->fails()){
            return view('includes/errors',['errors' => $validator->getMessageBag()])->render();
        }
        $validate = $validator->validated();
        $validate['list_id'] = $list->id;
        $validate['is_complete'] = false;
        $task = Task::create($validate);

        if($task){
            return view('includes/tasknode',['task' => $task, 'list' => $list])->render();
        }

        return view('includes/errors')->withErrors([
            'add' => 'Не удалось добавить задачу'
        ]);

    }

    function delete(Request $req,TasksList  $list, Task $task){
        $this->authorize('task-access',[self::class, $task]);
        if($list and $task){
            $task->delete();
            return "success";
        }
        return "failed";
    }

    function check(Request $req, TasksList $list, Task $task ){
        $this->authorize('task-access',[self::class,$task]);
        $task->is_complete = !$task->is_complete;
        $task->save();
        return $task->is_complete;
    }

    function __construct(){
        $this->middleware('auth');
    }
}
