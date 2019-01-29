@extends('layouts.app')
    
@section('content')
    <div class="container col-md-4">
        <canvas id="pieChart" width="300" height="300"></canvas>
    </div>   
    <div class="container col-md-4">
        <canvas id="barChart" width="300" height="300"></canvas>
    </div> 
@endsection

@section('javascript')
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
        $(document).ready(function (){
            var pieCharDocument = $('#pieChart');
            var data = {
                datasets: [{
                    data: [{{$todo}},{{$done}}],
                    backgroundColor:['red','yellow']
                }],
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    '正在办理',
                    '已完成',
                ]
            };
            var myPieChart = new Chart(pieCharDocument,{
                type: 'pie',
                data: data,
                options: {
                    title:{
                        display:true,
                        text:'饼状图'
                    }
                }
            });
            var barCharDocument = $('#barChart');
            var barData = {
                "labels":{!! $name !!},
                "datasets":[{
                    "label":"My First Dataset",
                    "data":[65,59],
                    "fill":false,
                    "backgroundColor":[
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(255, 159, 64, 0.2)",                        
                    ],
                    "borderColor":[
                        "rgb(255, 99, 132)",
                        "rgb(255, 159, 64)",                        
                    ],
                    "borderWidth":1
                }],
                
            }
            var myBarChart = new Chart(barCharDocument, {
                type: 'bar',
                data: barData,
                options:{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
            });
        })
        
    </script>
@endsection