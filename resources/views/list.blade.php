@extends('layouts/default')

@section('title-block'){{$list->title}}@endsection



@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/ajax.js')}}"></script>
    <div class="task-container d-flex flex-column justify-content-center my-5 ">
        <div class="d-flex justify-content-center">
            <div class="container w-95">
                <a href="../" class="btn btn-primary btn-block mb-4 ">Return</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="container w-95">
                <h2>{{$list->title}}</h2>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="container w-100">
                <form >
                @csrf
                <!-- Title input -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text " id="basic-addon1">Task</span>
                        </div>
                        <input id="task" type="text" class="form-control" name="task" aria-label="Title"
                               aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button id="add-task" value="/list/{{$list->id}}/add" class="btn btn-outline-secondary" type="submit">Add
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        @include('includes/errors')
        <div id="task-container">
            @foreach($tasks as $task)
                @include('includes/tasknode')
            @endforeach
        </div>

    </div>

@endsection
