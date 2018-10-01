$(document).ready(function() {

	$.ajax({
		url: BASE_URL + 'API/get_jumpengajuan_byMonth',
		method: 'GET',
		crossDomain: true,
		dataType: 'jsonp',
		success: function(data) {

			var label = [];
			var Jumlah = [];
			for (var i in data) {
				label.push(data[i].bulan);
				Jumlah.push(data[i].jumlah);

			}

			var datapengajuan = {
				labels: label,
				datasets: [{
					label: "Pengajuan Per Bulan",
					data: Jumlah,
					borderColor: '#77abff',
					backgroundColor: 'transparent',
					pointBorderColor: 'orange',
				}]
			};

			var ctx = $("#chart-pengajuan-bulan");
			var myNewChart = new Chart(ctx, {
				type: "line",
				data: datapengajuan,
				showTooltips: false,
				onAnimationComplete: function() {

					var ctx = this.chart.ctx;
					ctx.font = this.scale.font;
					ctx.fillStyle = this.scale.textColor
					ctx.textAlign = "center";
					ctx.textBaseline = "bottom";

					this.datasets.forEach(function(dataset) {
						dataset.points.forEach(function(points) {
							ctx.fillText(points.value, points.x, points.y - 10);
						});
					})
				},
				options: {
					scales: {
						// xAxes: [{
						// 	ticks: {
						// 		maxRotation: 90,
						// 		minRotation: 80
						// 	}
						// }],
						yAxes: [{
							ticks: {
								beginAtZero: true,
							}
						}]
					}

				}
			});

		},
		error: function(data) {
			console.log("gagal");
		}

	});

	$.ajax({
		url: BASE_URL + 'API/get_pengajuan_all_unit',
		method: 'GET',
		crossDomain: true,
		dataType: 'jsonp',
		success: function(data) {
			console.log(data);
			var label = [];
			var datas = [];
			for (var i in data) {
				label.push(data[i].namaUnit);
				datas.push(data[i].total);
			}
			var ctx = $("#chart-pengajuan-unitkerja");
			ctx.height = 500;
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [data[0]['namaUnit'], data[1]['namaUnit'], data[2]['namaUnit'], data[3]['namaUnit']],
					datasets: [{

						label: 'Pengajuan Unit Kerja',
						data: [data[0]['total'], data[1]['total'], data[2]['total'], data[3]['total']],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
						],
						borderWidth: 1
					}]
				},
				options: {

					scales: {
						xAxes: [{
							ticks: {
								maxRotation: 90,
								minRotation: 80
							}
						}],
						yAxes: [{
							ticks: {
								beginAtZero: true,

							}
						}]
					}

				}
			});

		},
		error: function(data) {
			console.log("gagal");
		}

	});

	// $.ajax({
	// 	url: BASE_URL + 'API/get_jumpengajuan_byMonth',
	// 	method: 'GET',
	// 	crossDomain: true,
	// 	dataType: 'jsonp',
	// 	success: function(data) {
	//
	// 		var label = [];
	// 		var Jumlah = [];
	// 		for (var i in data) {
	// 			label.push(data[i].bulan);
	// 			Jumlah.push(data[i].jumlah);
	//
	// 		}
	//
	// 		var chartdata = {
	// 			labels: label,
	// 			datasets: [{
	// 					label: 'jumlah',
	// 					fill: false,
	// 					lineTension: 2,
	// 					backgroundColor: "#4289f4",
	// 					borderColor: "rgba(59, 89, 152, 1)",
	// 					pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 					pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 					data: Jumlah
	// 				},
	// 				// {
	// 				// 	label: 'Wonokitri',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#f56979",
	// 				// 	borderColor: "#f56979",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Wonokitri
	// 				// },
	// 				// {
	// 				// 	label: 'Ranupani',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#f9f043",
	// 				// 	borderColor: "#f9f043",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Ranupani
	// 				// },
	// 				// {
	// 				// 	label: 'Tumpang',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#b9c4ae",
	// 				// 	borderColor: "#b9c4ae",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Tumpang
	// 				// },
	// 				// {
	// 				// 	label: 'KantorBalai',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#43f949",
	// 				// 	borderColor: "#43f949",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: KantorBalai
	// 				// }
	// 			],
	//
	// 		};
	// 		var ctx = $("#chart-pengajuan-bulan");
	// 		// var opt = {
	// 		// 	events: false,
	// 		// 	tooltips: {
	// 		// 		enabled: false
	// 		// 	},
	// 		// 	hover: {
	// 		// 		animationDuration: 0
	// 		// 	},
	// 		// 	animation: {
	// 		// 		duration: 5,
	// 		// 		onComplete: function() {
	// 		// 			var chartInstance = this.chart,
	// 		// 				ctx = chartInstance.ctx;
	// 		// 			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
	// 		// 			ctx.textAlign = 'center';
	// 		// 			ctx.textBaseline = 'bottom';
	// 		//
	// 		// 			this.data.datasets.forEach(function(dataset, i) {
	// 		// 				var meta = chartInstance.controller.getDatasetMeta(i);
	// 		// 				meta.data.forEach(function(bar, index) {
	// 		// 					var data = dataset.data[index];
	// 		// 					ctx.fillText(data, bar._model.x, bar._model.y - 5);
	// 		// 				});
	// 		// 			});
	// 		// 		}
	// 		// 	}
	// 		// };
	// 		var barGraph = new Chart(ctx, {
	// 			type: 'bar',
	// 			data: chartdata
	//
	// 		});
	// 	},
	// 	error: function(data) {
	// 		console.log("gagal");
	// 	}
	//
	// });
	// $.ajax({
	// 	url: BASE_URL + 'API/get_pengajuan_all_unit',
	// 	method: 'GET',
	// 	crossDomain: true,
	// 	dataType: 'jsonp',
	// 	success: function(data) {
	//
	// 		// var label = [];
	// 		// var Jumlah = [];
	// 		// for (var i in data) {
	// 		// 	label.push(data[i].bulan);
	// 		// 	Jumlah.push(data[i].jumlah);
	// 		//
	// 		// }
	//
	// 		console.log(data);
	// 		var label = [];
	// 		var Jumlah = [];
	// 		for (var i in data) {
	// 			label.push(data[i].namaUnit);
	// 			Jumlah.push(data[i].total);
	//
	// 		}
	// 		var chartdata = {
	// 			labels: label,
	// 			datasets: [{
	// 					label: 'jumlah',
	// 					fill: false,
	// 					lineTension: 2,
	// 					backgroundColor: "#4289f4",
	// 					borderColor: "rgba(59, 89, 152, 1)",
	// 					pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 					pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 					data: Jumlah
	// 				},
	// 				// {
	// 				// 	label: 'Wonokitri',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#f56979",
	// 				// 	borderColor: "#f56979",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Wonokitri
	// 				// },
	// 				// {
	// 				// 	label: 'Ranupani',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#f9f043",
	// 				// 	borderColor: "#f9f043",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Ranupani
	// 				// },
	// 				// {
	// 				// 	label: 'Tumpang',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#b9c4ae",
	// 				// 	borderColor: "#b9c4ae",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: Tumpang
	// 				// },
	// 				// {
	// 				// 	label: 'KantorBalai',
	// 				// 	fill: false,
	// 				// 	lineTension: 2,
	// 				// 	backgroundColor: "#43f949",
	// 				// 	borderColor: "#43f949",
	// 				// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 				// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 				// 	data: KantorBalai
	// 				// }
	// 			],
	//
	// 		};
	// 		var ctx = $("#chart-pengajuan-unitkerja");
	// 		var opt = {
	// 			events: false,
	// 			tooltips: {
	// 				enabled: false
	// 			},
	// 			hover: {
	// 				animationDuration: 0
	// 			},
	// 			animation: {
	// 				duration: 5,
	// 				onComplete: function() {
	// 					var chartInstance = this.chart,
	// 						ctx = chartInstance.ctx;
	// 					ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
	// 					ctx.textAlign = 'center';
	// 					ctx.textBaseline = 'bottom';
	//
	// 					this.data.datasets.forEach(function(dataset, i) {
	// 						var meta = chartInstance.controller.getDatasetMeta(i);
	// 						meta.data.forEach(function(bar, index) {
	// 							var data = dataset.data[index];
	// 							ctx.fillText(data, bar._model.x, bar._model.y - 5);
	// 						});
	// 					});
	// 				}
	// 			}
	// 		};
	// 		var barGraph = new Chart(ctx, {
	// 			type: 'bar',
	// 			data: chartdata
	//
	// 		});
	// 	},
	// 	error: function(data) {
	// 		console.log("gagal");
	// 	}
	//
	// });

	// var chartdata = {
	// 	labels: label,
	// 	datasets: [{
	// 			label: data[0]['namaUnit'],
	// 			fill: false,
	// 			lineTension: 2,
	// 			backgroundColor: "#4289f4",
	// 			borderColor: "rgba(59, 89, 152, 1)",
	// 			pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 			pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 			data: data[0]['total']
	// 		},
	// 		{
	// 			label: data[1]['namaUnit'],
	// 			fill: false,
	// 			lineTension: 2,
	// 			backgroundColor: "#f56979",
	// 			borderColor: "#f56979",
	// 			pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 			pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 			data: data[1]['total']
	// 		},
	// 		{
	// 			label: data[2]['namaUnit'],
	// 			fill: false,
	// 			lineTension: 2,
	// 			backgroundColor: "#f9f043",
	// 			borderColor: "#f9f043",
	// 			pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 			pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 			data: data[2]['total']
	// 		},
	// 		{
	// 			label: data[3]['namaUnit'],
	// 			fill: false,
	// 			lineTension: 2,
	// 			backgroundColor: "#43f949",
	// 			borderColor: "#43f949",
	// 			pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 			pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 			data: data[3]['total']
	// 		}
	// 		// {
	// 		// 	label: 'Wonokitri',
	// 		// 	fill: false,
	// 		// 	lineTension: 2,
	// 		// 	backgroundColor: "#f56979",
	// 		// 	borderColor: "#f56979",
	// 		// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 		// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 		// 	data: Wonokitri
	// 		// },
	// 		// {
	// 		// 	label: 'Ranupani',
	// 		// 	fill: false,
	// 		// 	lineTension: 2,
	// 		// 	backgroundColor: "#f9f043",
	// 		// 	borderColor: "#f9f043",
	// 		// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 		// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 		// 	data: Ranupani
	// 		// },
	// 		// {
	// 		// 	label: 'Tumpang',
	// 		// 	fill: false,
	// 		// 	lineTension: 2,
	// 		// 	backgroundColor: "#b9c4ae",
	// 		// 	borderColor: "#b9c4ae",
	// 		// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 		// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 		// 	data: Tumpang
	// 		// },
	// 		// {
	// 		// 	label: 'KantorBalai',
	// 		// 	fill: false,
	// 		// 	lineTension: 2,
	// 		// 	backgroundColor: "#43f949",
	// 		// 	borderColor: "#43f949",
	// 		// 	pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
	// 		// 	pointHoverBorderColor: "rgba(59, 89, 152, 1)",
	// 		// 	data: KantorBalai
	// 		// }
	// 	],
	//
	// };
	// var ctx = $("#chart-pengajuan-unitkerja");
	// var opt = {
	// 	events: false,
	// 	tooltips: {
	// 		enabled: false
	// 	},
	// 	hover: {
	// 		animationDuration: 0
	// 	},
	// 	animation: {
	// 		duration: 5,
	// 		onComplete: function() {
	// 			var chartInstance = this.chart,
	// 				ctx = chartInstance.ctx;
	// 			ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
	// 			ctx.textAlign = 'center';
	// 			ctx.textBaseline = 'bottom';
	//
	// 			this.data.datasets.forEach(function(dataset, i) {
	// 				var meta = chartInstance.controller.getDatasetMeta(i);
	// 				meta.data.forEach(function(bar, index) {
	// 					var data = dataset.data[index];
	// 					ctx.fillText(data, bar._model.x, bar._model.y - 5);
	// 				});
	// 			});
	// 		}
	// 	}
	// };
	// var barGraph = new Chart(ctx, {
	// 	type: 'bar',
	// 	data: chartdata
	//
	// });


});