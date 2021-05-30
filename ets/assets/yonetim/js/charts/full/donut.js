	$(function () {
		var data = [];
		var series = Math.floor(Math.random()*10)+1;
		for( var i = 0; i<series; i++)
		{
			data[i] = { label: "Series"+(i+1), data: Math.floor(Math.random()*100)+1 }
		}
	
	$.plot($("#donut"), data, 
	{
			series: {
				pie: { 
					show: true,
					innerRadius: 0.5,
					radius: 1,
					label: {
						show: false,
						radius: 2/3,
						formatter: function(label, series){
							return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
						},
						threshold: 0.1
					}
				}
			},
			legend: {
				show: true,
				noColumns: 1, 
				labelFormatter: null, 
				labelBoxBorderColor: "#000", 
				container: null, 
				position: "ne", 
				margin: [5, 10], 
				backgroundColor: "#ffffff", 
				backgroundOpacity: 1 
			},
			grid: {
				hoverable: true,
				clickable: true
			},
			colors: ["#ee7951", "#6db6ee", "#95c832", "#993eb7", "#3ba3aa"]
	});
	$("#interactive").bind("plothover", pieHover);
	$("#interactive").bind("plotclick", pieClick);
	
	});
	
	function pieHover(event, pos, obj) 
	{
		if (!obj)
					return;
		percent = parseFloat(obj.series.percent).toFixed(2);
		$("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
	}
	function pieClick(event, pos, obj) 
	{
		if (!obj)
					return;
		percent = parseFloat(obj.series.percent).toFixed(2);
		alert(''+obj.series.label+': '+percent+'%');
	}

	
