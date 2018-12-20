<!-- Button trigger modal -->

  
    <!-- Modal -->
<div class="modal fade" id="updateModal{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="updateModal{{$project->id}}label" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="updateModal">修改项目</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        {!! Form::model($project,['route'=>['projects.update',$project->id],'files'=>true,'method'=>'PATCH']) !!}
        <div class="modal-body">
            <div class="form-group">
            {!! Form::label('name','项目名称:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('thumbnail','项目缩略图:') !!}
            {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
            </div>
        </div>
        <div class="modal-footer">
        {!! Form::submit('修改项目',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    </div>
</div>