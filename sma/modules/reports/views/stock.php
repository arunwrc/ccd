<?php 
$session_warehouse_name=$this->session->userdata('default_warehouse');

/***********************
 API FOR FRONTACCOUNTING
************************/
$session_warehouse_name=$this->session->userdata('default_warehouse');
$method = isset($_GET['m']) ? $_GET['m'] : 'g'; // g, p, t, d => GET, POST, PUT, DELETE
$action = isset($_GET['a']) ? $_GET['a'] : 'inventorybylocode'; // http://www.my_fa_domain.com/modules/api/inventory.inc
$record = isset($_GET['r']) ? $_GET['r'] : $session_warehouse_name;
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, $data); //echo "<pre>"; print_r($output); echo "</pre>"; exit;
/***********************
************************/

 ?> 
 <?php
 
for ($i=0; $i < count($output); $i++) { 
    $Total_Products_price+=$output[$i]['Product_price'];
    $Total_Products_Standard_cost+=$output[$i]['Standard_cost'];
}

 ?>
<script src="<?php echo base_url(); ?>/assets/js/sl/highcharts.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/sl/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
   
$('#chart').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: ''
        },
credits: {
 	enabled: false
},
tooltip: {
shared: true,
backgroundColor: '#FFF',
headerFormat: '<span style="font-size:14px background-color: #FFF;">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0;text-align:right;"><?php echo CURRENCY_PREFIX; ?> <b>{point.y}</b> ({point.percentage:.1f}%)</td></tr>',
                footerFormat: '</table>',
                useHTML: true,
valueDecimals: 2,
style: {
fontSize: '13px',
padding: '10px',
fontWeight: 'bold',
color: '#000000'
}
            },
plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    format: '<h3 style="margin:-15px 0 0 0;"><b>{point.name}</b>:<br><?php echo CURRENCY_PREFIX; ?> <b>{point.y}</b></h3>',
useHTML: true
                }
            }
        },
        series: [{
            type: 'pie',
            name: '<?php echo $this->lang->line("stock_value"); ?>',
            data: [
                    ['<?php echo $this->lang->line("stock_value_by_price"); ?>',   <?php echo $Total_Products_price; ?>],
                    ['<?php echo $this->lang->line("stock_value_by_cost"); ?>',   <?php echo $Total_Products_Standard_cost; ?>],
['<?php echo $this->lang->line("profit_estimate"); ?>',   <?php echo ($Total_Products_price - $Total_Products_Standard_cost); ?>],
                ]
        }]
    });
    });
</script>
<div class="btn-group pull-right" style="margin-left: 25px;">
<a href="#" class="btn btn-primary">
<?php echo $session_warehouse_name; ?>

</a>
<ul class="dropdown-menu">
    <?php echo $links; ?>
    </ul>
    </div>
<h3 class="title"><?php echo $page_title." (".$session_warehouse_name.")"; ?></h3>
<p><?php //echo $this->lang->line("warehouse_stock_heading"); ?></p>
<p>&nbsp;</p>
<div id="chart" style="width:100%; height:450px;"></div>
