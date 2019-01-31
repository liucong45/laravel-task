var barCharDocument = $('#barChart');
var barData = {
    "labels":$('#barChartData').data('name'),
    "datasets":[{
        "label":"My First Dataset",
        "data":$('#barChartData').data('projects'),
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
    options:{
        "scales":{
            "yAxes":[{
                "ticks":{"beginAtZero":true}
            }]
        },
        title:{
            display:true,
            text:'柱状图'
        },
        responsive:true,
        legend:false,                    
    }
});