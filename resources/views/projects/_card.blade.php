<div class="col-3 my-3" >
    <div class="card project-card">
        <ul class="icon-bar">
            <li>@include('projects._destroy')</li>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$project->id}}">
                    <i class="fa fa-btn fa-cog"></i>
                </button>                
            </li>
            
        </ul>
    <a href="project/{{$project->id}}">
        <img class="card-img-top" src="{{asset('storage/thumbs/original/'.$project->thumbnail)}}" alt="Card image cap">
        <div class="card-body">
            <h6 class="card-title">{{$project->name}}</h6>
        </div>
    </a>
    </div>
    @include('projects._updateModal')
</div>