<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
.text_filter {
width: 100% !important;
font-weight: normal !important;
border: 0 !important;
box-shadow: none !important;
border-radius: 0 !important;
padding:0 !important;
margin:0 !important;
font-size: 1em !important;
}
.select_filter {
width: 100% !important;
padding:0 !important;
height: auto !important;
margin:0 !important;
}
.table td {
/*width: 12.5%;*/
display: table-cell;
}
.table th {
text-align: center;
}
.table td:nth-child(5), .table tfoot th:nth-child(5), .table td:nth-child(6), .table tfoot th:nth-child(6), .table td:nth-child(7), .table tfoot th:nth-child(7) {
text-align:right;
}
</style>
<script>
             $(document).ready(function() {
function format_date(oObj) {
//var sValue = oObj.aData[oObj.iDataColumn]; 
var aDate = oObj.split('-');
<?php if(JS_DATE == 'dd-mm-yyyy') { ?>
return aDate[2] + "-" + aDate[1] + "-" + aDate[0];
<?php } elseif(JS_DATE == 'dd/mm/yyyy') { ?>
return aDate[2] + "/" + aDate[1] + "/" + aDate[0];
<?php } elseif(JS_DATE == 'mm/dd/yyyy') { ?>
return aDate[1] + "/" + aDate[2] + "/" + aDate[0];
<?php } elseif(JS_DATE == 'mm-dd-yyyy') { ?>
return aDate[1] + "-" + aDate[2] + "-" + aDate[0];
<?php } else { ?>
return sValue;
<?php } ?>
}
function currencyFormate(x) {
var parts = x.toString().split(".");
  return  parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")+(parts[1] ? "." + parts[1] : "");
 
}
                $('#fileData').dataTable( {
"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 1, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
'bProcessing'    : true,
'bServerSide'    : true,
'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=sales&view=getdatatableajax',
'fnServerData': function(sSource, aoData, fnCallback, fnFooterCallback)
{
aoData.push( { "name": "<?php echo $this->security->get_csrf_token_name(); ?>", "value": "<?php echo $this->security->get_csrf_hash() ?>" } );
 $.ajax
 ({
'dataType': 'json',
'type'    : 'POST',
'url'     : sSource,
'data'    : aoData,
'success' : fnCallback
 });
},
"oTableTools": {
"sSwfPath": "assets/media/swf/copy_csv_xls_pdf.swf",
"aButtons": [
{
"sExtends": "csv",
"sFileName": "<?php echo $this->lang->line("sales"); ?>.csv",
                   	"mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
},
{
"sExtends": "pdf",
"sFileName": "<?php echo $this->lang->line("sales"); ?>.pdf",
"sPdfOrientation": "landscape",
                   	"mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
},
"print"
]
},
"aoColumns": [ 
 { "mRender": format_date },  null,  null, null, { "mRender": currencyFormate }, { "mRender": currencyFormate }, { "mRender": currencyFormate },
 { "bSortable": false }
],
"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
var row_total = 0; tax_total =0; tax2_total = 0;
for ( var i=0 ; i<aaData.length ; i++ )
{
//tax_total += parseFloat(aaData[ aiDisplay[i] ][4]);
tax2_total += parseFloat(aaData[ aiDisplay[i] ][5]);
row_total += parseFloat(aaData[ aiDisplay[i] ][6]);
}
var nCells = nRow.getElementsByTagName('th');
//nCells[4].innerHTML = currencyFormate(parseFloat(tax_total).toFixed(2));
nCells[5].innerHTML = currencyFormate(parseFloat(tax2_total).toFixed(2));
nCells[6].innerHTML = currencyFormate(parseFloat(row_total).toFixed(2));
}
                } ).columnFilter({ aoColumns: [

{ type: "text", bRegex:true },
{ type: "text", bRegex:true },
{ type: "text", bRegex:true },
{ type: "text", bRegex:true },
null, null, null, null
                     ]});
            } );
                    
</script>
<?php
/***********************
 API FOR FRONTACCOUNTING
************************/
$location=$this->session->userdata('default_warehouse');
$trans_type='10';
$method = isset($_GET['m']) ? $_GET['m'] : 'g'; 
$action = isset($_GET['a']) ? $_GET['a'] : 'getsalesbylocation'; 
$record = isset($_GET['r']) ? $_GET['r'] : $trans_type."/".$location;
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, $data);
/***********************
************************/
 ?>  
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>
<div class="btn-group pull-right" style="margin-left: 25px;"> <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $session_warehouse_name=$this->session->userdata('default_warehouse'); ?>  </a>
</div>
<div class="btn-group pull-right"> 
<a href="/index.php?module=sales&view=canceled_sales" class="btn btn-primary">
<?php echo "View Canceled Sales"; ?>  
</a>
</div>
<h3 class="title"><?php echo $page_title; ?></h3>
<table class="table table-bordered table-hover table-striped table-condensed" style="margin-bottom: 5px;">
  <thead>
    <tr>
      <th><?php echo $this->lang->line("date"); ?></th>
      <th><?php echo $this->lang->line("reference_no"); ?></th>
      <th><?php echo $this->lang->line("customer"); ?></th>
      <th><?php echo $this->lang->line("Items"); ?></th>
      <th style="width:55px; text-align:center;"><?php echo $this->lang->line("actions"); ?></th>
    </tr>
  </thead>
<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php for ($i=0; $i < count($output); $i++) { 
$line_items=count($output[$i]['line_items']).'<br>';?>
<?php for ($lines=0;$lines<$line_items;$lines++){ ?>
<?php  if($output[$i]['line_items'][$lines]['qty']!=0){ // To check for any canceled Sale.?>
<tr>
<td><?php $date=$output[$i]['tran_date']; echo date('d - m - Y',strtotime($date));?></td>
<td><?php echo $output[$i]['reference'];?></td>
<td><?php echo $output[$i]['debtor_no'];?></td>
<?php for ($lines=0;$lines<$line_items;$lines++){ $slno=$lines+1; ?>
<td width="300px">
<table style="margin:auto;border:inset; width=300px;">
<th>Sl</th>
<th>Item</th>
<th>Quantity</th>
<th>Price</th>
<?php for ($lines=0;$lines<$line_items;$lines++){ $slno=$lines+1; ?>
               <tr>
                   <td><?php echo $slno;?></td>              
                   <td><?php echo $output[$i]['line_items'][$lines]['description'];?></td>  
                   <td><?php echo $output[$i]['line_items'][$lines]['qty'];?></td>      
                   <td><?php  echo $output[$i]['line_items'][$lines]['price']; ?></td>               
               </tr>
<?php }?>   
           	<tr>
           	<td></td>
           	<td></td>
           	<td></td>
           	<td><b><?php  echo $output[$i]['ov_amount']; ?></b></td>
           	<?php $g_total+=$output[$i]['ov_amount'];?>
           	</tr>
       </table>
</td>
<?php } ?>
<td width=".3%">
<center>
<?php
/***********************
API FOR FRONTACCOUNTING
************************/
$location=$this->session->userdata('default_warehouse');
$trans_type='10';
//include_once "fabridge.php";
$method_ = isset($_GET['m']) ? $_GET['m'] : 'g'; 
$action_ = isset($_GET['a']) ? $_GET['a'] : 'getsalesbylocation'; 
$record_ = isset($_GET['r']) ? $_GET['r'] : $trans_type."/".$location;
$filter_ = isset($_GET['f']) ? $_GET['f'] : false;
$output_ = $this->fabridge->open($method_, $action_, $record_, $filter_, $data_);
/***********************
API FOR FRONTACCOUNTING
************************/
$reference_no= $output_[$i]['trans_no'];?>
<a href="<?php echo 'index.php?module=sales&void='.$ref_id=$reference_no;?>" title="" class="tip" data-original-title="Cancel Sale"><i class="icon-remove-sign"></i></a> 
<?php if ($_GET['void']!=0){ //To confirm not to insert '0' value on pageload
$void_value=$_GET['void']; 
$method_void = isset($_GET['m']) ? $_GET['m'] : 'p'; 
$action_void = isset($_GET['a']) ? $_GET['a'] : 'voidsale';
$record_void = isset($_GET['r']) ? $_GET['r'] : '';
$filter_void = isset($_GET['f']) ? $_GET['f'] : false;
$data_void = array(
'type'=> '10',
'id'=> $void_value,
//'date_'=>'01-01-2015',
'memo_'=> '0');
$output_void = $this->fabridge->open($method_void, $action_void, $record_void, $filter_void, $data_void);
}
?>
</center>
</td>
</tr><?php
} //// To check for any canceled Sale.
} //Item Line Ends
} //Count of (outputitems) ?>
</tbody>
<tfoot>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th><?php echo "Total Sale : ".$g_total ?></th>
      <th></th>
    </tr>
  </tfoot>
</table>
<div class="btn-group" style="margin-left: 25px;"> <a class="btn btn-primary ">
<?php echo $session_warehouse_name=$this->session->userdata('default_warehouse'); ?>  </a>
</div>
