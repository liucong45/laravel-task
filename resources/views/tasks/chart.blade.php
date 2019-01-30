@extends('layouts.app')
    
@section('content')
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300"></canvas>
        <div id="pieChartData" data-todo={{$todo}} data-done={{$done}} data-total={{$total}}></div>
    </div>   
    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
        <div id="barChartData" data-name={!! json_encode($name,JSON_UNESCAPED_UNICODE) !!} data-projects={!! json_encode($projects,JSON_UNESCAPED_UNICODE) !!}></div>
    </div> 
@endsection

@section('javascript')
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/Chart.Bar.js')}}"></script>
    <script src="{{asset('js/Chart.Pie.js')}}"></script>
@endsection