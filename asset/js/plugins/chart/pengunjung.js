$(document).ready(function() {
	$('.Tahun').on('change', function() {
		Tahun = this.value;
		pengunjung(Tahun);
	})
	pengunjung(Tahun);

	function pengunjung(Tahun) {
		$.ajax({
			url: BASE_URL + "API/get_pengunjung_bulan_all/" + Tahun,
			method: 'GET',
			crossDomain: true,
			dataType: 'jsonp',
			success: function(data) {

				var label = [];
				var Menu = [];
				var CemoroLawang = [];
				var Wonokitri = [];
				var Ranupani = [];
				var Tumpang = [];
				var KantorBalai = [];
				for (var i in data) {
					label.push(data[i].Bulan);
					CemoroLawang.push(data[i].CemoroLawang);
					Wonokitri.push(data[i].Wonokitri);
					Tumpang.push(data[i].Tumpang);
					Ranupani.push(data[i].Ranupani);
					KantorBalai.push(data[i].KantorBalai);
				}

				var chartdata = {
					labels: label,
					datasets: [{
							label: 'CemoroLawang',
							fill: false,
							lineTension: 2,
							backgroundColor: "#4289f4",
							borderColor: "rgba(59, 89, 152, 1)",
							pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							data: CemoroLawang
						},
						{
							label: 'Wonokitri',
							fill: false,
							lineTension: 2,
							backgroundColor: "#f56979",
							borderColor: "#f56979",
							pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							data: Wonokitri
						},
						{
							label: 'Ranupani',
							fill: false,
							lineTension: 2,
							backgroundColor: "#f9f043",
							borderColor: "#f9f043",
							pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							data: Ranupani
						},
						{
							label: 'Tumpang',
							fill: false,
							lineTension: 2,
							backgroundColor: "#b9c4ae",
							borderColor: "#b9c4ae",
							pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							data: Tumpang
						},
						{
							label: 'KantorBalai',
							fill: false,
							lineTension: 2,
							backgroundColor: "#43f949",
							borderColor: "#43f949",
							pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
							pointHoverBorderColor: "rgba(59, 89, 152, 1)",
							data: KantorBalai
						}
					],

				};
				var ctx = $("#pengunjung");
				var opt = {
					events: false,
					tooltips: {
						enabled: false
					},
					hover: {
						animationDuration: 0
					},
					animation: {
						duration: 5,
						onComplete: function() {
							var chartInstance = this.chart,
								ctx = chartInstance.ctx;
							ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
							ctx.textAlign = 'center';
							ctx.textBaseline = 'bottom';

							this.data.datasets.forEach(function(dataset, i) {
								var meta = chartInstance.controller.getDatasetMeta(i);
								meta.data.forEach(function(bar, index) {
									var data = dataset.data[index];
									ctx.fillText(data, bar._model.x, bar._model.y - 5);
								});
							});
						}
					}
				};
				var barGraph = new Chart(ctx, {
					type: 'bar',
					data: chartdata

				});
			},
			error: function(data) {
				console.log("gagal");
			}

		});
	}
});
