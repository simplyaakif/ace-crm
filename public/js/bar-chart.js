var ctx = document.getElementById(chart_canvas).getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: chart_labels,
datasets: [{
    label: 'Total Visit',
    data: chart_values,
backgroundColor: chart_bg
}]
},
options: {
    legend: {
        display: false,
            labels: {
            display: false
        }
    },
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
                fontSize: 10,
                max: chart_max
    }
    }],
        xAxes: [{
            ticks: {
                beginAtZero: true,
                fontSize: 11
            }
        }]
    }
}
});
