<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    function check(Request $req, Task $task ){
        $this->authorize('task-access',[self::class,$task]);
        $task->is_complete = !$task->is_complete;
        $task->save();
        return $task->is_complete;
    }

}
