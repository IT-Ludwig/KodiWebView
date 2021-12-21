<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>See</title>

		
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
	    var chart;

    $(document).ready(function () {
	<?php if($count_m['count'] != 0) { ?>		
	    var container2 = new Highcharts.Chart({
        chart: {
			renderTo: 'container2',
			backgroundColor: '',
            plotBackgroundColor: '',
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: '<?=$mGes?>',
            align: 'center',
			style: {
                color: 'red',
                fontWeight: 'bold'
            },
			verticalAlign: 'middle',
            y: 60
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
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
            type: 'pie',
            name: '<?=$lang['movie']?>',
            innerSize: '50%',
            data: [
                ['<?=$lang['seen']?>', <?=$mSeen?>],
                ['<?=$lang['not_seen']?>', <?=$mUSeen?>],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
	<?php } if($count_o['count'] != 0) { ?>
		var container3 = new Highcharts.Chart({
        chart: {
			renderTo: 'container3',
			backgroundColor: '',
            plotBackgroundColor: '',
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: '<?=$oGes?>',
            align: 'center',
			style: {
                color: 'red',
                fontWeight: 'bold'
            },
            verticalAlign: 'middle',
            y: 60
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
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
            type: 'pie',
            name: '<?=$lang['movie']?>',
            innerSize: '50%',
            data: [
                ['<?=$lang['seen']?>', <?=$oSeen?>],
                ['<?=$lang['not_seen']?>', <?=$oUSeen?>],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
	<?php } if($count_s['count'] != 0) { ?>
	var container4 = new Highcharts.Chart({
        chart: {
			renderTo: 'container4',
			backgroundColor: '',
            plotBackgroundColor: '',
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: '<?=$sGes?>',
            align: 'center',
			style: {
                color: 'red',
                fontWeight: 'bold'
            },
            verticalAlign: 'middle',
            y: 66
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
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
            type: 'pie',
            name: '<?=$lang['movie']?>',
            innerSize: '50%',
            data: [
                ['<?=$lang['seen']?>', <?=$sSeen?>],
                ['<?=$lang['not_seen']?>', <?=$sUSeen?>],
                {
                    name: 'Proprietary or Undetectable',
                    y: 0.2,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });
});
	<?php } ?>
});


		</script>
	</head>
	<body>
<table border="0" width="100%">
	<tr>
		<td><div id="container2" style="min-width: 310px; height: 330px;"></div></td>

		<td><div id="container3" style="min-width: 350px; height: 330px;"></div></td>

		<td><div id="container4" style="min-width: 350px; height: 330px;"></div></td>
	</tr>
</table>
	</body>
</html>
