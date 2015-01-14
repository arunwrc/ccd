<script src="<?php echo $this->config->base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
<style type="text/css">
.text_filter { width: 100% !important; border: 0 !important; box-shadow: none !important;  border-radius: 0 !important;  padding:0 !important; margin:0 !important; }
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
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=suppliers&view=getdatatableajax',
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
								// "copy",
								"csv",
								"xls",
								{
									"sExtends": "pdf",
									"sPdfOrientation": "landscape",
									"sPdfMessage": ""
								},
								"print"
						]
					},
					"oLanguage": {
					  "sSearch": "Filter: "
					},
					"aoColumns": [ 
					  null,
					  null,
					  null,
					  null,
					  null,
					  null, 

					  { "bSortable": false }
					]
					
                } ).columnFilter({ aoColumns: [
                                                            //{ type: "text", bRegex:true },
															//null, null, null, null, null, null, null, null,
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															{ type: "text", bRegex:true },
															null
                                                            
                                                        ]});
				
            } );
                    
</script>

<?php
/***********************
 API FOR FRONTACCOUNTING
************************/
$method = isset($_GET['m']) ? $_GET['m'] : 'g'; 
$action = isset($_GET['a']) ? $_GET['a'] : 'suppliers'; 
$record = isset($_GET['r']) ? $_GET['r'] : '';
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, $data);
/***********************
************************/
?>

<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>


	<h3 class="title"><?php echo $page_title; ?></h3>
	<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
	
	<table  cellpadding=0 cellspacing=10 class="table table-bordered table-hover table-striped">
		<thead>
        <tr>
			<th><?php echo "Supplier id"; ?></th>
			<th><?php echo $this->lang->line("company"); ?></th>
            <th><?php echo $this->lang->line("phone"); ?></th>
            <th><?php echo $this->lang->line("address"); ?></th>
			<th><?php echo "Account No:"; ?></th>
            <th><?php echo $this->lang->line("country"); ?></th>
            <th style="width:45px;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </thead>

        <!--<tfoot>
        <tr>
			<th>[<?php echo $this->lang->line("name"); ?>]</th>
			<th>[<?php echo $this->lang->line("company"); ?>]</th>
            <th>[<?php echo $this->lang->line("phone"); ?>]</th>
            <th>[<?php echo $this->lang->line("address"); ?>]</th>
			<th>[<?php echo $this->lang->line("city"); ?>]</th>
            <th>[<?php echo $this->lang->line("country"); ?>]</th>
            <th style="width:45px;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </tfoot>-->

       

        <!-- Newly Added-->
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	<?php for ($i=0; $i < count($output); $i++) { ?>
        		
        	
        	<tr>
        		<td><?php echo $output[$i]['supplier_id'];?></td>
        		<td><?php echo $output[$i]['supp_name'];?></td>
        		<td><?php echo $output[$i]['contact'];?></td>
        		<td><?php echo $output[$i]['supp_address'];?></td>
        		<td><?php echo $output[$i]['bank_account'];?></td>
        		<td><?php echo $output[$i]['supp_name'];?></td>
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
	
	<p><a href="<?php echo site_url('module=suppliers&view=add');?>" class="btn btn-primary"><?php echo $this->lang->line("add_supplier"); ?></a></p>
