@extends('layouts.app')

@section('content')
<div class="container">
    @include('errors._error')
    @include('projects._createModal')
</div>
@endsection