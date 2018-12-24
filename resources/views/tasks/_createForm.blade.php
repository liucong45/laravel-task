{!! Form::open(['route'=>['tasks.store','project_id'=>$project->id],'method'=>'POST',]) !!}
<div class="input-group mb-2">
    <div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-plus"></i></div></div>
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'您还有未完成的任务吗？']) !!}
</div>
{!! Form::close() !!}