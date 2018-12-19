@extends('layouts.app')

@section('content')
<div class="container">        
    <div class="card-deck">@each('projects._card', $projects, 'project')</div>   
    @include('errors._error')
    @include('projects._createModal')
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('.icon-bar').hide();
        $('.project-card').hover(function(){
            $(this).find('.icon-bar').toggle();
        })
    })
</script>   
@endsection