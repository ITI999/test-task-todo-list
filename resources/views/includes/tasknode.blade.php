<div id="task-{{$task->id}}-container" class="d-flex justify-content-center">
    <div class="list-group list-group-flush w-100">
        <div class="list-group-item  d-flex gap-3 py-0">
            <label class=" list-group-item list-group-item-action  ">
                <input id="{{$task->id}}" class="update-status form-check-input flex-shrink-0  "
                       {{$task->is_complete ? 'checked' : ''}} type="checkbox" value="/list/{{$list->id}}/check/{{$task->id}}"
                       style="font-size: 1.375em;">
                <span class="pt-1 form-checked-content ">
                              <strong id="title-{{$task->id}}"
                                      class="mx-1 {{$task->is_complete ? 'complete-task' : ''}}">{{$task->task}}</strong>
                              <small class="mx-2 d-block text-muted">
                                <svg class="bi me-1" width="1em" height="1em"><use
                                        xlink:href="#calendar-event"></use></svg>
                                {{(new Carbon\Carbon($task->created_at))->diffForHumans()}}
                              </small>
                            </span>
            </label>
            <form action="" method="post">
                @method('DELETE')
                @csrf
                <button id="task-{{$task->id}}" type="submit" name="task_delete"
                        value="/list/{{$list->id}}/delete/{{$task->id}}" class="btn-close btn-close-task h-100"
                        aria-label="Close"></button>
            </form>
        </div>

    </div>
</div>
