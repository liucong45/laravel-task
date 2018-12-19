{!! Form::open(['route'=>['projects.destroy',$project->id],'method'=>'DELETE']) !!}
    <button class="btn btn-default" type="submit">
        <i class="fa fa-btn fa-times"></i>
    </button>
{!! Form::close() !!}