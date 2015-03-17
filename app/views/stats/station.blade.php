<!-- {{ Form::select('fuel_station_id', $tripType) }} -->
{{ Form::close() }}
<canvas id="chart" width="600" height="300"></canvas>

<script>
    var data = {
            labels: {{ $labels }},
            datasets: [
                {
                    fillColor: "#F7464A",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "#FF5A5E",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: {{ $averageValue }}
                }
            ]
        },
        options = {
            scaleBeginAtZero : true,
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.05)",
            scaleGridLineWidth : 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            barShowStroke : true,
            barStrokeWidth : 2,
            barValueSpacing : 5,
            barDatasetSpacing : 1,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
        },
        ctx = document.getElementById("chart").getContext("2d"),
        chart = new Chart(ctx).Bar(data, options);
</script>