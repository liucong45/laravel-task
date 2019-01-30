var pieCharDocument = $('#pieChart');
var data = {
    datasets: [{
        data: [$('#pieChartData').data('todo'),$('#pieChartData').data('done')],
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
            text:'饼状图(任务总数：'+$('#pieChartData').data('todo')+')'
        }
    }
});