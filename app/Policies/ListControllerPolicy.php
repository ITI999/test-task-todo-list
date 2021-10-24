<?php

namespace App\Policies;

use App\Models\TasksList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ListControllerPolicy
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


    public function listAccess(?User $user, TasksList $list): Response
    {
        if($user and $list->user_id == $user->id)
            return Response::allow("Access");
        return Response::deny("You don't have any rights to see this page");

    }
}
