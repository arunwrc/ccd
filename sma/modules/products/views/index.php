<?php
$session_warehouse_name=$this->session->userdata('default_warehouse');
?>

<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
.text_filter { width: 100% !important; font-weight: normal !important; border: 0 !important; box-shadow: none !important;  border-radius: 0 !important;  padding:0 !important; margin:0 !important; font-size: 1em !important;}
.select_filter { width: 100% !important; padding:0 !important; height: auto !important; margin:0 !important;}
</style>
<script>
             $(document).ready(function() {
                $('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 0, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					<?php $no_cost = array('salesman', 'viewer'); 
					  		if (!$this->ion_auth->in_group($no_cost)) { 
					  ?>
					  'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=products&view=getdatatableajaxcost',
					  <?php } else { ?>
					  'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=products&view=getdatatableajax',
					  <?php } ?>
					'fnServerData': function(sSource, aoData, fnCallback)
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
									"sFileName": "<?php echo $this->lang->line("products"); ?>.csv",
                   		 			"mColumns": [ 0, 1, 2, 3, 4, 5<?php $no_cost = array('salesman', 'viewer'); 
							if (!$this->ion_auth->in_group($no_cost)) { echo ', 6'; } ?> ]
								},
								{
									"sExtends": "pdf",
									"sFileName": "<?php echo $this->lang->line("products"); ?>.pdf",
									"sPdfOrientation": "landscape",
                   		 			"mColumns": [ 0, 1, 2, 3, 4, 5<?php $no_cost = array('salesman', 'viewer'); 
							if (!$this->ion_auth->in_group($no_cost)) { echo ', 6'; } ?> ]
								},
								"print"
						]
					},
					"aoColumns": [ 
					  null, null, null, null, null, null, null,
					  <?php $no_cost = array('salesman', 'viewer'); 
					  		if (!$this->ion_auth->in_group($no_cost)) { 
					  
					  echo "null,";
					  }
					  ?>
					  { "bSortable": false }
					]
					
                } ).columnFilter({ aoColumns: [

						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						{ type: "text", bRegex:true },
						<?php $no_cost = array('salesman', 'viewer'); 
							if (!$this->ion_auth->in_group($no_cost)) { 
								echo '{ type: "text", bRegex:true },';
							}
						?>
						{ type: "text", bRegex:true },
						null
                     ]});
			
			$('#fileData').on('click', '.image', function() {
				var a_href = $(this).attr('href');
				var code = $(this).attr('id');
				$('#myModalLabel').text(code);
				$('#product_image').attr('src',a_href);
				$('#picModal').modal();
				return false;
			});
			$('#fileData').on('click', '.barcode', function() {
				var a_href = $(this).attr('href');
				var code = $(this).attr('id');
				$('#myModalLabel').text(code);
				$('#product_image').attr('src',a_href);
				$('#picModal').modal();
				return false;
			});
			
				
            });
                    
</script>
<?php
/***********************
 API FOR FRONTACCOUNTING
************************/
$session_warehouse_name=$this->session->userdata('default_warehouse');
$method = isset($_GET['m']) ? $_GET['m'] : 'g'; 
$action = isset($_GET['a']) ? $_GET['a'] : 'inventorybylocode'; 
$record = isset($_GET['r']) ? $_GET['r'] : $session_warehouse_name;
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, $data); //echo "<pre>"; print_r($output); echo "</pre>"; exit;
/***********************
************************/
 ?>  

<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>

<div class="btn-group pull-right" style="margin-left: 25px;"> <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	<?php echo $session_warehouse_name=$this->session->userdata('default_warehouse'); ?>  </a>
</div>

<h3 class="title"><?php echo $page_title; ?></h3>

	<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
    
	<table  class="table table-bordered table-condensed" style="margin-bottom: 5px;">
		<thead>
        <tr>
			<th><?php echo $this->lang->line("product_code"); ?></th>
            <th><?php echo $this->lang->line("product_name"); ?></th>
            <th><?php echo $this->lang->line("category"); ?></th>
            <?php $no_cost = array('salesman', 'viewer'); 
				  if (!$this->ion_auth->in_group($no_cost)) { 
            echo "<th>".$this->lang->line("product_cost")."</th>";
            } ?>
            <th><?php echo $this->lang->line("product_price"); ?></th>
            <th><?php echo $this->lang->line("quantity"); ?></th>
            <th><?php echo $this->lang->line("product_unit"); ?></th>
            <th><?php echo $this->lang->line("warehouse"); ?></th>
            
            <th style="min-width:115px; text-align:center;"><?php echo $this->lang->line("actions"); ?></th> 
		</tr>
        </thead>

        
       <!-- <tfoot>
        <tr>
			<th>[<?php echo $this->lang->line("product_code"); ?>]</th>
            <th>[<?php echo $this->lang->line("product_name"); ?>]</th>
            <th>[<?php echo $this->lang->line("category"); ?>]</th>
            <?php $no_cost = array('salesman', 'viewer'); 
				  if (!$this->ion_auth->in_group($no_cost)) { 
            echo "<th>[".$this->lang->line("product_cost")."]</th>";
            } ?>
            <th>[<?php echo $this->lang->line("product_price"); ?>]</th>
            <th>[<?php echo $this->lang->line("quantity"); ?>]</th>
            <th>[<?php echo $this->lang->line("product_unit"); ?>]</th>
            <th>[<?php echo $this->lang->line("warehouse"); ?>]</th>
            
            <th style="width:115px; text-align:center;"><?php echo $this->lang->line("actions"); ?></th> 
		</tr>
        </tfoot>-->
        <!-- Newly Added-->
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	<?php for ($i=0; $i < count($output); $i++) { ?>
        		
        	<?php if ($output[$i]['Product_Quantity'] <= 20){ ?>
        	<tr  bgcolor="#ffccc;">
        	<?php } else {?>
        	<tr>
        	<?php }?>	
        		<td><?php echo $output[$i]['Product_code'];?></td>
        		<td><?php echo $output[$i]['Product_name'];?></td>
        		<td><?php echo $output[$i]['Category'];?></td>
        		<td><?php echo $output[$i]['Standard_cost'];?></td>
        		<td><?php echo $output[$i]['Product_price'];?></td>
        		<td><?php echo $output[$i]['Product_Quantity'];?></td>	
        		<td><?php echo $output[$i]['UOM'];?></td>
        		<td><?php echo $output[$i]['Warehouse_name'];?></td>
        		<td>
        			<center>
        			<a href="index.php?module=suppliers&amp;view=edit&amp;id=1" title="" class="tip" data-original-title="Edit Supplier"><i class="icon-edit"></i></a> 
        			<a href="index.php?module=suppliers&amp;view=delete&amp;id=1" onclick="return confirm('You are going to remove this supplier. Press OK to proceed and Cancel to Go Back')" title="" class="tip" data-original-title="Delete Supplier">
        				<i class="icon-trash"></i>
        			</a>
        			</center>
        		</td>
        	</tr>
        	<?php }?>
        </tbody>
		<!-- Newly Added Ends-->
	</table>
	
	
<div class="btn-group pull-left" style="margin-left: 25px;"> <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	<?php echo $session_warehouse_name=$this->session->userdata('default_warehouse'); ?>  </a>
</div>
    
<div id="picModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="picModalLabel" aria-hidden="true">
 <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel"></h3>
</div>
<div class="modal-body" style="text-align:center; height:200px;">
<img id="product_image" src="" style="height:100%;" />
</div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>
