<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Rental</title>

		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
	var chart;
	
	    $(document).ready(function () {			    
        var container2 = new Highcharts.Chart({

        chart: {
			renderTo: 'container2',
            backgroundColor: '',
            plotBackgroundColor: '',
			plotBorderWidth: 0,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '<?=$lang['anteil']?>: <b>{point.y}</b> ({point.percentage:.1f}%)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: <b>{point.y}</b> ({point.percentage:.1f}%)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
           
				    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
					     },
            }
        },
		credits: {
            enabled: false
        },
        series: [{
            name: '<?=$lang['persona']?>',
            colorByPoint: true,
            data: [<?=$line_1?>]
        }]
    });
});
});
		</script>
<div id="container2">" style="width: 98%; height: 400px; margin: 0 auto;"></div>
