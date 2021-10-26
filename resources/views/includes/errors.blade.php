@if($errors->any())
    <div class="error-response d-flex justify-content-center ">
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
