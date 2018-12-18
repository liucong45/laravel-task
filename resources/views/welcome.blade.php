@extends('layouts.app')

@section('content')
<div class="container">
    

    <div class="card-deck">
        @foreach ($projects as $project)
        <div class="col-3 my-3" >
            <div class="card">
            <a href="project/{{$project->id}}">
                <img class="card-img-top" src="{{asset('storage/thumbs/original/'.$project->thumbnail)}}" alt="Card image cap">
                <div class="card-body">
                    <h6 class="card-title">{{$project->name}}</h6>
                    {{-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </a>
            </div>
        </div>
        @endforeach
    @include('errors._error')
    @include('projects._createModal')    
</div>
@endsection