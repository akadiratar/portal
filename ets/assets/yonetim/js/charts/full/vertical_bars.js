$(function () {
    var previousPoint;
 
    var d1 = [];
    for (var i = 0; i <= 10; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);
 
    var d2 = [];
    for (var i = 0; i <= 10; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);
 
    var d3 = [];
    for (var i = 0; i <= 10; i += 1)
        d3.push([i, parseInt(Math.random() * 30)]);
 
    var ds = new Array();
 
     ds.push({
        data:d1,
        bars: {
            show: true, 
            barWidth: 0.2, 
            order: 1,
        }
    });
    ds.push({
        data:d2,
        bars: {
            show: true, 
            barWidth: 0.2, 
            order: 2
        }
    });
    ds.push({
        data:d3,
        bars: {
            show: true, 
            barWidth: 0.2, 
            order: 3
        }
    });
                
    function showTooltip(x, y, contents, areAbsoluteXY) {
        var rootElt = 'body';
    
        $('<div id="tooltip" class="chart-tooltip">' + contents + '</div>').css( {
            top: y - 50,
            left: x - 6,
            opacity: 0.9
        }).prependTo(rootElt).show();
    };
                
    $.plot($("#vertical_bars"), ds, {
        colors: ["#ee7951", "#6db6ee", "#95c832", "#993eb7", "#3ba3aa"],
        grid:{
            hoverable:true
        }
    });

$("#vertical_bars").bind("plothover", function (event, pos, item) {
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