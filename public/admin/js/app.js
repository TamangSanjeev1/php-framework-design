$(document).ready(function(){
	$.ajax({
		url: "http://127.0.0.1/FYP/FinalYearProject/user/chartData",
		method: "GET",
		success: function(data){
			console.log(data);
			var quantity = [];
			var ord_date = [];
			for(var i in data){
				quantity.push("quantity"+ data[i].product_quantity);
				ord_date.push(data[i].req_date);		
			}

			var chartdata = {
				labels: ord_date,
				datasets: [{
					label: 'order quantity',
					backgroundColor: 'rgba(200,200,200,0.75)',
					hoverBackgroundColor: 'rgba(200,200,200,1)',
					hoverBorderColor: 'rgba(200,200,200,1)',
					data: quantity
				}]
			};

			var ctx = $("#myCanvas");
			var barGraph = new Chart(ctx,{
				type: 'bar',
				data: chartdata
			});

		},
		error: function(data){
			console.log(data);
		}
	});
});