@extends('layouts/default')

@section('title-block', 'Todo List')

@section('content')


    <script type="text/javascript" src="{{ URL::asset('js/ajax.js')}}"></script>
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
                    <form {{--action="/list/add"--}} method="post">
                    @csrf
                    <!-- Title input -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="basic-addon1">Title</span>
                            </div>
                            <input id="title" type="text" class="form-control" name="title" aria-label="Title"
                                   aria-describedby="basic-addon1">
                        </div>

                        <!-- Description input -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text h-100">Description</span>
                            </div>
                            <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                        </div>

                        <!-- Submit button -->
                        <input id="add-list" type="submit" class="btn btn-primary btn-block mb-4 w-100" value="Add">
                    </form>
                </div>
            </div>
            @include('includes/errors')
            <div id="list-container">
                @foreach($lists as $list)
                    @include('includes/listnode')
                @endforeach
            </div>
        @else
            <div class="d-flex justify-content-center">
                <div class="container w-95">
                    <h3>Please login or register, to use todo list</h3>
                </div>
            </div>

        @endif
    </div>





@endsection
