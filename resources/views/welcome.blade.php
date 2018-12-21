@extends('layouts.app')

@section('content')
@include('errors._error')
<div class="container">        
    <div class="card-deck">
        @each('projects._card', $projects, 'project')
        @include('projects._createModal') 
    </div>   
    
    
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