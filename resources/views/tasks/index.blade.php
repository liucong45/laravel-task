@extends('layouts.app')
@section('content')
    <div class="container">         
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
                @if (count($todo))
                <table class="table table-striped">
                    @foreach ($todo as $task)
                    <tr>
                        <td class="col-9">
                        <span class="badge badge-secondary mr-3">{{ $task->updated_at->diffForHumans() }}</span>
                            {{$task->name}}
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
                </table>
                <div class="pull-right">
                {{ $todo->links() }}    
                </div> 
                @endif   
            </div>
            <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab"><table class="table table-striped">
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
    </div>
@endsection
