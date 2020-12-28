<script type="text/javascript">
    
 $(function () {
    $('#piechwart').highcharts({
        chart: {
            height: 250,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            backgroundColor: 'transparent',
            type: 'spline'
        },
        title: {
            
            text: ' <span class="label2"></span>' //ใส่ชื่อกราฟ
            
        },
        colors: [ '#FFFCEF', '#FAF8E7','#F2F2D5'],
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}  ({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f} (<strong>{point.percentage:.1f} %</strong>)',
                    style: {
                        
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
                    }
                }
            }
        },
        xAxis: {
            
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: "",
            colorByPoint: true,
            data: [
   <?php
   $c_field = $res_c->field_count-1;
    $c_pie=0; while($row_pie = $res_c->fetch_array(MYSQLI_NUM)){ $c_pie++; ?>
   <?php if($c_pie>1){ ?>,<?php } ?>
    {
     name: "<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_pie[0]))))); ?>",
     y: <?php echo $row_pie[$c_field]; ?>
    }
   <?php } ?>
   ]
        }]
    });
});
</script>
        
<script type="text/javascript">
$(function () {
    $('#barchart').highcharts({
        chart: {
            height: 250,
            backgroundColor: 'transparent',
            type: 'column'
        },
        colors: ['white'],
        title: {
            text: '<span class="label2"></span>' //ใส่ชื่อกราฟ
        },
/*        subtitle: {
            text: ''
        },*/
        xAxis: {
            
            categories: [
            <?php
                $c_field_bar = $res_bar->field_count-1;
                $c_bar=0; while($row_bar = $res_bar->fetch_array(MYSQLI_NUM)){ $c_bar++; ?>
            <?php if($c_bar>1){ ?>,<?php } 
                $data_bar[] = $row_bar[$c_field_bar]; 
            ?>
              '<?php echo htmlspecialchars(addslashes(str_replace("\t","",str_replace("\n","",str_replace("\r","",$row_bar[0]))))); ?>'
              <?php } ?>
            ],
            labels: {
            style: {
                color: 'white'
            }
        },
            crosshair: true
            
        },
        yAxis: {
            labels: {
        style: {
            color: 'white'
               }
            },
            min: 0,
            title: {
                text: 'จำนวน',
                style: {
            color: 'white'
               }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
    dataLabels: {
     enabled: true,
     color: 'orange'
    }
   }
        },
  credits: {
   enabled: false
  },
        series: [{
            name: '',
            data: [<?php echo join(',',$data_bar); ?>]
 
        }]
    });
});
</script>