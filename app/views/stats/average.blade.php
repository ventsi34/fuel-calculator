{{ Form::close() }}
<p>Average consumption of all information {{ $averageConsumption }} litres</p>
<canvas id="chart" width="300" height="300"></canvas>
<script>
    var data = {{ $chartData }},
        options = {
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 2,
            percentageInnerCutout : 50,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        },
        ctx = document.getElementById("chart").getContext("2d"),
        chart = new Chart(ctx).Doughnut(data, options);
</script>