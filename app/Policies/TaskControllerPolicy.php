<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\TasksList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function taskAccess(?User $user, Task $task): Response
    {

        if($user and TasksList::find($task->list_id)->user_id == $user->id)
            return Response::allow("Access");
        return Response::deny("You don't have any rights to see this page");

    }
}
