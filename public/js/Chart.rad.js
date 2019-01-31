var rad = document.getElementById("radChart").getContext('2d');
var options = {
    scale:{
        // Hides the scale
        display:false
    }
};
var data={
    labels: ['任务总数', '完成的项目', '未完成的项目'],
    datasets: [
        {
            label:'项目名称1',
            backgroundColor:'rgba(50,150,160,0.5)',
            pointBackgroundColor:"rgba(200,200,200,0.5)",
            pointBorderColor:"#000",
            data: [15, 5, 10]
        },
        {
            label:'项目名称2',
            backgroundColor:'rgba(150,250,160,0.5)',
            pointBackgroundColor:"rgba(100,100,100,0.5)",
            pointBorderColor:"#fff",
            data: [16, 8, 8]
        },
    ]
}

var options={
    responsive : true,
    title:{
        display:true,
        text:'雷达图'
    },
    legend:{
        display:true,
        position:'bottom'
    }
}

var myRadarChart = new Chart(rad, {
    type: 'radar',
    data: data,
    options: options
});