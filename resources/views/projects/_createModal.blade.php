<div class="card project-card col-3 my-3">
    <div class="card-body d-flex align-items-center justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
            <i class="fa fa-btn fa-plus"></i>
        </button>
            
            <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">新建项目</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                {!! Form::open(['route'=>'projects.store','files'=>true,'method'=>'POST']) !!}
                <div class="modal-body">
                <!-- <form action='/' method='POST' accept-charset="UTF-8">
                <div class="form-group">
                    <label for="name">项目名称:</label>
                    <input class="form-control" name="name" type="text" value="" id="name">
                </div>
                <div class="form-group">
                    <label for="thumbnail">项目缩略图:</label>
                    <input class="form-control-file" name="thumbnail" type="file" id="thumbnail">
                </div>
                    <input name="_token" type='hidden' value=' {{ csrf_token() }}'/>
                </form> -->
                
                    <div class="form-group">
                    {!! Form::label('name','项目名称:') !!}
                    {!! Form::text('name','',['class'=>'form-control']) !!}
                    </div>
        
                    <div class="form-group">
                    {!! Form::label('thumbnail','项目缩略图:') !!}
                    {!! Form::file('thumbnail',['class'=>'form-control-file']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
                {!! Form::submit('新建项目',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
</div>
