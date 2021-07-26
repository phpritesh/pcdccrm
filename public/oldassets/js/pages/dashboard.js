$(function () {
    // create line chart
    $.get(base_url + 'home/get_performance_data', function (res) {
        $('#line_chart').highcharts({
            title: {
                text: 'Performance Graph',
                x: 0 //center
            },
            subtitle: {
                text: '',
                x: 0
            },
            xAxis: {
                categories: res.months
            },
            yAxis: {
                title: {
                    text: 'Number of Registration'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: res.data,
            credits: {
                enabled: false
            }
        });
    }, 'json');

    // Create bar chart
    $.get(base_url + 'home/get_all_workers_data', function (res) {
        $('#bar_chart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Worker Registration Graph'
            },
            xAxis: {
                categories: res.months
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Workers'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: res.data,
            credits: {
                enabled: false
            }
        });
    }, 'json');

	
	// Create order verification chart
    $.get(base_url + 'home/get_order_verification_data', function (res) {
        $('#verification_chart').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Order Verification Items'
            },
            xAxis: {
                categories: res.months
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Verification Items'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: res.data,
            credits: {
                enabled: false
            }
        });
    }, 'json');
	
    // create pie chart
    $.get(base_url + 'home/get_users_work_history', function (res) {
        $('#pie_chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Worker\'s Work History'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:1f}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f}% ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Workers',
                colorByPoint: true,
                data: res.data
            }],
            credits: {
                enabled: false
            }
        });
    }, 'json');

    // create bar chart2
    $.get(base_url + 'home/get_resident_data', function (res) {
        $('#bar_chart2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Society Graph'
            },
            xAxis: {
                categories: res.months
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Residents'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: res.data,
            credits: {
                enabled: false
            }
        });
    }, 'json');
});