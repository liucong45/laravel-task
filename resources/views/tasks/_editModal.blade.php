<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#taskEdit-{{ $task->id }}">
    <i class="fa fa-cog"></i>
</button>
<div class="modal fade" id="taskEdit-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="taskEdit-{{ $task->id }}lLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskEdit-{{ $task->id }}Label">编辑任务</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'PATCH']) !!}
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name','任务名称:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
                {!! $errors->getBag('update-'.$task->id)->first('name','<div class="alert alert-danger">:message</div>') !!}
            </div>

            <div class="form-group">
                {!! Form::label('project','所属项目:') !!}
                {!! Form::select('project',$projects,null,['class'=>'form-control']) !!}
                {!! $errors->getBag('update-'.$task->id)->first('project','<div class="alert alert-danger">:message</div>') !!}
            </div>
        </div>
        <div class="modal-footer">
        {!! Form::submit('提交',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close()  !!}
      </div>
    </div>
  </div>