$(function () {
    var previousPoint;
 

    var d1_h = [];
    for (var i = 0; i <= 3; i += 1)
        d1_h.push([parseInt(Math.random() * 20),i ]);

    var d2_h = [];
    for (var i = 0; i <= 3; i += 1)
        d2_h.push([parseInt(Math.random() * 20),i ]);

    var d3_h = [];
    for (var i = 0; i <= 3; i += 1)
        d3_h.push([ parseInt(Math.random() * 20),i]);
                
    var ds_h = new Array();
    ds_h.push({
        data:d1_h,
        bars: {
            horizontal: true, 
            show: true, 
            lineWidth: 0,
            barWidth: 0.2, 
            order: 1
        }
    });
ds_h.push({
    data:d2_h,
    bars: {
        horizontal: true, 
        lineWidth: 0,
        show: true, 
        barWidth: 0.2, 
        order: 2
    }
});
ds_h.push({
    data:d3_h,
    bars: {
        horizontal: true, 
        lineWidth: 0,
        show: true, 
        barWidth: 0.2, 
        order: 3
    }
});

    function showTooltip(x, y, contents, areAbsoluteXY) {
        var rootElt = 'body';
	
        $('<div id="tooltip" class="chart-tooltip">' + contents + '</div>').css( {
            top: y - 50,
            left: x - 25,
            opacity: 0.9
        }).prependTo(rootElt).show();
    };

$.plot($("#horizontal_bars"), ds_h, {
    colors: ["#ee7951", "#6db6ee", "#95c832", "#993eb7", "#3ba3aa"],
    grid:{
        hoverable:true
    }
});

$("#horizontal_bars").bind("plothover", function (event, pos, item) {
    if (item) {
        if (previousPoint != item.datapoint) {
            previousPoint = item.datapoint;
 
            $('.chart-tooltip').remove();
 
            var x = item.datapoint[0];
 
            if(item.series.bars.order){
                for(var i=0; i < item.series.data.length; i++){
                    if(item.series.data[i][3] == item.datapoint[0])
                        x = item.series.data[i][0];
                }
            }
 
            var y = item.datapoint[1];
 
            showTooltip(item.pageX+5, item.pageY+5,x + " = " + y);
 
        }
    }
    else {
        $('.chart-tooltip').remove();
        previousPoint = null;
    }
 
});

 
});