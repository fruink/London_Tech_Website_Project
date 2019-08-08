(function() {

	google.charts.load('current', {packages: ['corechart']});

var navyc = document.querySelector('#closer');
var navyo = document.querySelector('#opener');
var circles = document.querySelectorAll('.circle');
var jobSquare = document.querySelectorAll('.hiring');
var b = 0;
var wages = document.querySelector('#mingwageimg');
var housing = document.querySelector('#housingimg');
var jobs = document.querySelector('#jobsimg');
var edu = document.querySelector('#educationimg');



function openNav(){
  document.querySelector('#mySideNav').style.width = '100%';
	navyo.style.display = 'none';
}

function closeNav(){
  document.querySelector('#mySideNav').style.width = '0';
	navyo.style.display = 'block';
}

function cycle(){
	for (var i = 0; i < circles.length; i++){
		circles[i].classList.remove('fillIn');
	}
	this.classList += " fillIn";
	if (this.id =="numbuhOne"){
		for (var i = 0; i < jobSquare.length; i++){
			jobSquare[i].style.backgroundColor = 'white';
	}
} else if (this.id == 'numbuhTwo'){
	for (var i = 0; i < jobSquare.length; i++){
		jobSquare[i].style.backgroundColor = 'red';
}
} else if (this.id == 'numbuhThree'){
	for (var i = 0; i < jobSquare.length; i++){
		jobSquare[i].style.backgroundColor = 'purple';
}

} else if (this.id == 'numbuhFour'){
	for (var i = 0; i < jobSquare.length; i++){
		jobSquare[i].style.backgroundColor = 'blue';
	}
}
}

function drawChart(){
var jsonData = $.ajax({
		url: "includes/pageView.php",
		dataType: "json",
		async: false
		}).responseText;
var data = new google.visualization.DataTable(jsonData);

	var options = {
hAxis: {title: 'Wages by Year',  titleTextStyle: {color: '#333'}},
  vAxis: {minValue: 0},
			series: {
	0: { color: '#ceebe9' },
	1: { color: '#adaac6' },
  },
		legend:{position:'top'}
};
		var chart = new google.visualization.AreaChart(document.getElementById('minwageimg'));
chart.draw(data, options);


		var jsonData2 = $.ajax({
				url: "includes/sessions.php",
				dataType: "json",
				async: false
				}).responseText;

		var data2 = new google.visualization.DataTable(jsonData2);

			var options2 = {
				hAxis: {title: 'Rent By Year',  titleTextStyle: {color: '#333'}},
				vAxis: {minValue: 0},
				series: {
					0: { color: '#1b1464' },
					1: { color: '#00aeef' },
				},
				legend:{position:'top'},
				bars: 'vertical'
				};
				var chart2 = new google.visualization.ColumnChart(document.getElementById('housingimg'));
		chart2.draw(data2, options2);


				var jsonData3 = $.ajax({
						url: "includes/leads.php",
						dataType: "json",
						async: false
						}).responseText;

				var data3 = new google.visualization.DataTable(jsonData3);

					var options3 = {
						hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
						vAxis: {minValue: 0},
						series: {
							0: { color: '#ceebe9' },
							1: { color: '#adaac6' },
							2: {color: '#b112e5'},
						},
						legend:{position:'top'}
						};
						var chart3 = new google.visualization.AreaChart(jobs);
				chart3.draw(data3, options3);

						var jsonData4 = $.ajax({
								url: "includes/filled.php",
								dataType: "json",
								async: false
								}).responseText;

						var data4 = new google.visualization.DataTable(jsonData4);

							var options4 = {
						hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
						  vAxis: {minValue: 0},
								series: {
									0: { color: '#1b1464' },
									1: { color: '#0076a3' },
									2: { color: '#abeee6' },
								},
								legend:{position:'top'},
								bars: 'vertical'
						};
								var chart4 = new google.visualization.ColumnChart(edu);
						chart4.draw(data4, options4);
}

navyc.addEventListener('click', closeNav, false);
navyo.addEventListener('click', openNav, false);
for (var i = 0; i < circles.length; i++){
	circles[i].addEventListener('click',cycle,false);
}
google.charts.setOnLoadCallback(drawChart);

})();
