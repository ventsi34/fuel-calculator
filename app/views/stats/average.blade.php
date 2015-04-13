{{ Form::close() }}
</div>
<div class="average-stat tcenter">
    <div class="small-container ib vmiddle">Average consumption <p class="tcenter">{{ $averageConsumption }}</p> liters</div>
    <canvas id="chart" class="valign" width="300" height="300"></canvas>
</div>
<script>
    var responsive = false;
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        responsive = true;
    }
    var data = {{ $chartData }},
        options = {
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 2,
            percentageInnerCutout : 50,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            responsive: responsive,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        },
        ctx = document.getElementById("chart").getContext("2d"),
        chart = new Chart(ctx).Doughnut(data, options);
</script>