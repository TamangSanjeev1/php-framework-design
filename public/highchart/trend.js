function showTrend(){ //this funtion is used to get data of one or more than two years from database and display in a chart to show 
					 // pattern data mining 
	$.ajax({
		'url': "../../user/chartData",
		'type': 'POST',
		'data': $("#form").serialize(),
		'success': function(response) { 
			var data = [];
			var raw = JSON.parse(response);
			for(i in raw)
			{
				data.push({
					'name': i,
					'data': raw[i]
				});
			}
			console.log(JSON.stringify(data));
			Highcharts.chart('show', {
			    chart: {
			        type: 'line'
			    },
			    title: {
			        text: 'Monthly Average Temperature'
			    },
			    xAxis: {
			        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			    },
			    yAxis: {
			        title: {
			            text: 'Temperature (°C)'
			        }
			    },
			    plotOptions: {
			        line: {
			            dataLabels: {
			                enabled: true
			            },
			            enableMouseTracking: false
			        }
			    },

			    series: data
			    
			});
		},
		'error': function(){
			console.log('error');
		}
	});
	}
	$("#btn_chart").click(function(){
		showTrend();	
	});
showTrend();
	