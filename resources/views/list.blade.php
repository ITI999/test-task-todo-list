@extends('layouts/default')

@section('title-block', 'List')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/list.js')}}"></script>
    <div class="task-container d-flex flex-column justify-content-center my-5 ">

        <div class="d-flex justify-content-center">
            <div class="container w-100">
                <form action="/list/{{$list->id}}" method="post">
                @csrf
                <!-- Title input -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text " id="basic-addon1">Task</span>
                        </div>
                        <input type="text" class="form-control" name="task"  aria-label="Title" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        @if($errors->any())
            <div class="d-flex justify-content-center ">
                <div class="list-group list-group-flush w-100 ">
                    <div class='alert alert-danger mx-3 py-2'>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @foreach($tasks as $task)

            <div class="d-flex justify-content-center">
                <div class="list-group list-group-flush w-100" >
                    <div  class="list-group-item  d-flex gap-3 py-0" >
                        <label  class=" list-group-item list-group-item-action  " >
                            <input class="update-status form-check-input flex-shrink-0  " {{$task->is_complete ? 'checked' : ''}} type="checkbox" value="{{$task->id}}" style="font-size: 1.375em;">
                            <span class="pt-1 form-checked-content ">
                              <strong id="title-{{$task->id}}" class="mx-1 {{$task->is_complete ? 'complete-task' : ''}}">{{$task->task}}</strong>
                              <small class="mx-2 d-block text-muted">
                                <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#calendar-event"></use></svg>
                                {{(new Carbon\Carbon($task->created_at))->diffForHumans()}}
                              </small>
                            </span>
                        </label>
                        <form action="/list/{{$list->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" name="task_delete" value="{{$task->id}}" class="btn-close h-100"  aria-label="Close"></button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

@endsection
