<script>
             $(document).ready(function() {
                $('#fileData').dataTable( {
					"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[ 0, "desc" ]],
                    "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
					'bProcessing'    : true,
					'bServerSide'    : true,
					'sAjaxSource'    : '<?php echo base_url(); ?>index.php?module=categories&view=getdatatableajax',
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
						"sSwfPath": "smlib/media/swf/copy_csv_xls_pdf.swf",
						"aButtons": [
								{
									"sExtends": "csv",
									"sFileName": "Products.csv",
                   		 			"mColumns": [ 0, 1, 2 ]
								},
								{
									"sExtends": "pdf",
									"sFileName": "<?php echo $this->lang->line("products"); ?>.pdf",
									"sPdfOrientation": "landscape",
                   		 			"mColumns": [ 0, 1, 2 ]
								},
								"print"
						]
					},
					"aoColumns": [ 
					  null,
					  null,
					  null,
					  { "bSortable": false }
					]
					
                } );
				
            } );
       
</script>
<?php
/***********************
 API FOR FRONTACCOUNTING
************************/
$method = isset($_GET['m']) ? $_GET['m'] : 'g'; // g, p, t, d => GET, POST, PUT, DELETE
$action = isset($_GET['a']) ? $_GET['a'] : 'category'; // http://www.my_fa_domain.com/modules/api/suppliers.inc
$record = isset($_GET['r']) ? $_GET['r'] : '';
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, $data);
/***********************
************************/
?>        
<!-- Errors -->
<?php if($message) { echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>"; } ?>
<?php if($success_message) { echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>"; } ?>

	<h3 class="title"><?php echo $page_title; ?></h3>
	<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
	
	<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">
		<thead>
        <tr>
			<th style="width:45px;"><?php echo $this->lang->line("no"); ?></th>
            <th><?php echo $this->lang->line("category_name"); ?></th>
			<th><?php echo "Unit of measurement"; ?></th>
            <th style="width:65px;"><?php echo $this->lang->line("actions"); ?></th>
		</tr>
        </thead>
		<!--<tbody>
			<tr>
            	<td colspan="4" class="dataTables_empty">Loading data from server</td>
			</tr>

        </tbody>-->
        <!-- Newly Added-->
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	<?php for ($i=0; $i < count($output); $i++) { ?>
        		
        	
        	<tr>
        		<td><?php echo $output[$i]['category_id'];?></td>
        		<td><?php echo $output[$i]['description'];?></td>
        		<td><?php echo $output[$i]['dflt_units'];?></td>

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
	
	<p><a href="<?php echo site_url('module=categories&view=add');?>" class="btn btn-primary"><?php echo $this->lang->line("add_category"); ?></a></p>
	

