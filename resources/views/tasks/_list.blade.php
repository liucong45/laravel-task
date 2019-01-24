<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="true">
            待办事项
        <span class="badge badge-pill badge-danger">{{count($todo)}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">
            已完成
        <span class="badge badge-pill badge-success">{{count($done)}}</span>
        </a>
    </li>
    
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="todo" role="tabpanel" aria-labelledby="todo-tab">
        <table class="table table-striped">
            <tr><td colspan="4">@include('tasks._createForm')</td></tr>
            {{-- @each('tasks._listTable',$todo,'task') --}}
            @if (count($todo))
            @foreach ($todo as $task)
            <tr>
                <td class="col-9">
                <span class="badge badge-secondary mr-3">{{ $task->updated_at->diffForHumans() }}</span>
                <a href="{{route('tasks.steps.index',$task->id)}}">{{$task->name}}</a>
                </td>
                <td>
                    @include('tasks._checkForm')
                </td>
                <td>
                    @include('tasks._editModal')
                </td>
                <td>
                    @include('tasks._destroyForm')
                </td>
            </tr>    
            @endforeach 
            @endif
        </table>        
    </div>
    <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab"><table class="table table-striped">
            {{-- @each('tasks._listTable',$done,'task') --}}
            @if (count($done))
            @foreach ($done as $task)
            <tr>
                <td>{{$task->name}}</td>
                <td>@include('tasks._checkForm')</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#taskEdit-{{ $task->id }}">
                        <i class="fa fa-cog"></i>
                    </button>
                    @include('tasks._editModal')
                </td>
            </tr>
            @endforeach 
            @endif            
        </table>   
    </div>
</div>