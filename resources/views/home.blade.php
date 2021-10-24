@extends('layouts/default')

@section('title-block', 'Todo List')

@section('content')


    <div class=" d-flex flex-column justify-content-center my-5 ">

        @if(Auth::check())
            <div class="d-flex justify-content-center">
                <div class="container w-95">
                    <h2>Your todo lists</h2>
                    <p>Here you can create and edit lists</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="container w-100">
                    <form action="/" method="post">
                    @csrf
                    <!-- Title input -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="basic-addon1">Title</span>
                            </div>
                            <input type="text" class="form-control" name="title"  aria-label="Title" aria-describedby="basic-addon1">
                        </div>

                        <!-- Description input -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" >
                                <span class="input-group-text h-100" >Description</span>
                            </div>
                            <textarea name="description" class="form-control" rows="2" ></textarea>
                        </div>

                        <!-- Submit button -->
                        <input type="submit" class="btn btn-primary btn-block mb-4 w-100" value="Add">
                    </form>
                </div>
            </div>
            @if($errors->any())
                <div class="d-flex justify-content-center ">
                    <div class="list-group list-group-flush w-100 ">
                        <div class='alert alert-danger mx-3'>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($lists as $list)

                <div class="d-flex justify-content-center">

                    <div class="list-group list-group-flush w-100" >
                        <div  class="list-group-item  d-flex gap-3 py-3" >
                            <a href="list/{{$list->id}}" class="list-group-item list-group-item-action  " >
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">{{$list->title}}</h6>
                                        <p class="mb-0 opacity-75">{{$list->description}}</p>
                                    </div>
                                    <small class="opacity-50 text-nowrap">{{(new Carbon\Carbon($list->created_at))->diffForHumans()}}</small>
                                </div>
                            </a>
                            <form action="/" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" name="list_delete" value="{{$list->id}}" class="btn-close"  aria-label="Close"></button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            <div class="d-flex justify-content-center">
                <div class="container w-95">
                    <h3>Please login or register, to use todo list</h3>
                </div>
            </div>

        @endif
    </div>





@endsection
