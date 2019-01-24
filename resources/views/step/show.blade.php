@extends('layouts.app')

@section('content')
<div class="container" id='app'>
    <h3>{{$task->name}}</h3>
    <steps 
        route="{{ route('tasks.steps.index',$task->id) }}" 
        :init-steps="{{json_encode($steps)}}"
        :in-process='{{json_encode($inProcess)}}'
        :process='{{json_encode($process)}}'
    ></steps>
</div>
    
@endsection