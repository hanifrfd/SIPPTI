$(document).ready(function() {
	var nvd3Charts = function() {

		var myColors = ["#33414E", "#8DCA35", "#00BFDD", "#FF702A", "#DA3610",
			"#80CDC2", "#A6D969", "#D9EF8B", "#FFFF99", "#F7EC37", "#F46D43",
			"#E08215", "#D73026", "#A12235", "#8C510A", "#14514B", "#4D9220",
			"#542688", "#4575B4", "#74ACD1", "#B8E1DE", "#FEE0B6", "#FDB863",
			"#C51B7D", "#DE77AE", "#EDD3F2"
		];
		d3.scale.myColors = function() {
			return d3.scale.ordinal().range(myColors);
		};

		var startChart9 = function() {
			//Regular pie chart example
			nv.addGraph(function() {
				var chart = nv.models.pieChart().x(function(d) {
					return d.label;
				}).y(function(d) {
					return d.value;
				}).showLabels(true).color(d3.scale.myColors().range());;

				d3.select("#chart-unitKerja svg").datum(callback).transition().duration(350).call(chart);

				return chart;
			});

			//Donut chart example
			nv.addGraph(function() {
				var chart = nv.models.pieChart().x(function(d) {
						return d.label;
					}).y(function(d) {
						return d.value;
					}).showLabels(true) //Display pie labels
					.labelThreshold(.05) //Configure the minimum slice size for labels to show up
					.labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
					.donut(true) //Turn on Donut mode. Makes pie chart look tasty!
					.donutRatio(0.35) //Configure how big you want the donut hole size to be.
					.color(d3.scale.myColors().range());;

				d3.select("#chart-10 svg").datum(callback).transition().duration(350).call(chart);

				return chart;
			});

			//Pie chart example data. Note how there is only a single array of key-value pairs.
			function exampleData() {
				var c = [{
					"label": "One",
					"value": 29.765957771107
				}, {
					"label": "Two",
					"value": 0
				}, {
					"label": "Three",
					"value": 32.807804682612
				}, {
					"label": "Four",
					"value": 196.45946739256
				}, {
					"label": "Five",
					"value": 0.19434030906893
				}, {
					"label": "Six",
					"value": 98.079782601442
				}, {
					"label": "Seven",
					"value": 13.925743130903
				}, {
					"label": "Eight",
					"value": 5.1387322875705
				}];

				return c;
			}

			console.log(exampleData());


			// var callback = $.ajax({
			// 	url: 'http://localhost/CI/Skripsi/API/get_jumpengajuan_byUnitKerja',
			// 	type: 'get',
			// 	success: function(data) {
			// 		return data;
			// 	},
			// 	dataType: "jsonp"
			// }).responseText;

			function get_it(callback) {
				$.ajax({
					type: "GET",
					url: BASE_URL + "API/get_jumpengajuan_byUnitKerja",
					dataType: "json",
					success: callback
				});
			}

			var callback = function() {
				var atas = null;
				$.ajax({
					type: "GET",
					url: BASE_URL + "API/get_jumpengajuan_byUnitKerja",
					dataType: "json",
					async: false,
					global: false,
					success: function(data) {
						datas = data;
					}

				});
				return datas;
			}();


			console.log(callback);
			// console.log(callback)




		};

		function stream_layers(n, m, o) {
			if (arguments.length < 3)
				o = 0;

			function bump(a) {
				var x = 1 / (.1 + Math.random()),
					y = 2 * Math.random() - .5,
					z = 10 / (.1 + Math.random());
				for (var i = 0; i < m; i++) {
					var w = (i / m - y) * z;
					a[i] += x * Math.exp(-w * w);
				}
			}

			return d3.range(n).map(function() {
				var a = [],
					i;
				for (i = 0; i < m; i++)
					a[i] = o + o * Math.random();
				for (i = 0; i < 5; i++)
					bump(a);
				return a.map(stream_index);
			});
		}

		function stream_index(d, i) {
			return {
				x: i,
				y: Math.max(0, d)
			};
		}

		return {
			init: function() {
				startChart9();
			}
		};
	}();

	nvd3Charts.init();
});