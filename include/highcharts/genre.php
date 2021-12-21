<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Genre</title>

		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
	    var chart;

    $(document).ready(function () {
        var container1 = new Highcharts.Chart({
        chart: {
			renderTo: 'container1',
            type: 'bar',
			backgroundColor: '',
			width: 1020,
			height: 1750
        },

        title: {
            text: '<?=$lang['anzahl'].$lang['_nach_'].$lang['genre']?>',
			style: {
                color: 'red',
                fontWeight: 'bold'
            }
        },
		
        xAxis: {
            categories: <?=$genres_x?>,
			labels: {
                style: {
                    color: 'red'
                }
            }
        },
		yAxis: {
            title: {
                text: '',
                align: 'high'
            },
			labels: {
                style: {
                    color: 'red'
                }
            }
        },
        tooltip: {
            valueSuffix: ' <?=$lang['movie']?>'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true,
					shadow: false,
					color: 'red'
                },

            }
        },
        legend: {
            itemStyle: {
                color: 'red'
            }
        },
        credits: {
            enabled: false
        },
		 navigation: {
            buttonOptions: {
                enabled: false
            }
        },
        series: [{
            name: 'Kodi <?=$lang['movie']?>',
            data: <?=$countGenreM?>
        }, {
            name: 'Kodi <?=$lang['serie']?>',
            data: <?=$countGenreS?>
        }, {
            name: '<?=$lang['original']?>',
            data: <?=$countGenreO?>
        }]
		
    });
	
	  });
});
		</script>
	</head>
	<body>

<div id="container1"><div>

	</body>
</html>
