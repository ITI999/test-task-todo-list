<div id="list-{{$list->id}}-container" class="d-flex justify-content-center">

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
                @method('DELETE')
                @csrf
                <button id="list-{{$list->id}}" type="submit" name="list_delete" value="/list/delete/{{$list->id}}" class="btn-close btn-close-list"  aria-label="Close"></button>

        </div>

    </div>
</div>
