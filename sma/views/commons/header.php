
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $page_title ." &middot; ". SITE_NAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo $this->config->base_url(); ?>assets/css/<?php echo THEME; ?>.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url(); ?>assets/js/jquery.js"></script>
<script>
$(function () {
	$('input.tip, select.tip').tooltip({ placement: "right", trigger: "focus" });
	$('.tip').tooltip();
    $(".chzn-select").on("liszt:showing_dropdown", function () {
            $(this).parents("div").css("overflow", "visible");
    });
    $(".chzn-select").on("liszt:hiding_dropdown", function () {
            $(this).parents("div").css("overflow", "");
    });
	$("form select").chosen({no_results_text: "<?php echo $this->lang->line('no_results_matched'); ?>", disable_search_threshold: 5, allow_single_deselect:true });
	$('#note').redactor({
		buttons: ['formatting', '|', 'alignleft', 'aligncenter', 'alignright', 'justify', '|', 'bold', 'italic', 'underline', '|', 'unorderedlist', 'orderedlist', '|', 'image', 'video', 'link', '|', 'html'],
		formattingTags: ['p', 'pre', 'h3', 'h4'],
		imageUpload: '<?php echo site_url('module=home&view=image_upload'); ?>',
		imageUploadErrorCallback: function(json)
        {
           bootbox.alert(json.error);
        },
		minHeight: 100
	});
	$('#internal_note').redactor({
		buttons: ['formatting', '|', 'alignleft', 'aligncenter', 'alignright', 'justify', '|', 'bold', 'italic', 'underline', '|', 'unorderedlist', 'orderedlist', '|', 'image', 'video', 'link', '|', 'html'],
		formattingTags: ['p', 'pre', 'h3', 'h4'],
		imageUpload: '<?php echo site_url('module=home&view=image_upload'); ?>',
		imageUploadErrorCallback: function(json)
        {
           bootbox.alert(json.error);
        },
		minHeight: 100,
		placeholder: '<?php echo $this->lang->line('internal_note'); ?>'
	});
	$('.redactor_toolbar a').tooltip({container: 'body'});
	$('.showSubMenus').click(function() {
		var sub_menu = $(this).attr('href');
		$('.sub-menu').slideUp('fast');
		$('.menu').find("b").removeClass('caret-up').addClass('caret');
				
			if ($(sub_menu).is(":hidden")) {
				$(sub_menu).slideDown("slow");
				$(this).find("b").removeClass('caret').addClass('caret-up');
			} else {
				$(sub_menu).slideUp();
				$(this).find("b").removeClass('caret-up').addClass('caret');
			}
		return false;
	});
	$('.menu-collapse').click(function() {
		$('#col_1').slideToggle();
  	});

});
$(window).resize(function() {
if($(document).width() > 980) {
$('#col_1').show();
}
});
</script>
<!--[if lt IE 9]>
      <script src="<?php echo $this->config->base_url(); ?>assets/js/html5shiv.js"></script>
<![endif]-->
</head>

<body>
<div id="wrap">
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <button type="button" class="btn btn-navbar menu-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="brand" href="<?php echo $this->config->base_url(); ?>"><img src="<?php echo $this->config->base_url(); ?>assets/img/<?php echo LOGO; ?>" alt="<?php echo SITE_NAME; ?>" /></a> 
    <ul class="hidden-desktop nav pull-right"><li><a class="hdate"> <?php echo date('l, F d, Y'); ?> </a></li></ul>
    <div class="nav-collapse collapse">
      <ul class="nav pull-right">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <?php echo FIRST_NAME; ?>! <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&amp;view=change_password"><?php echo $this->lang->line('change_password'); ?></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&amp;view=logout"><?php echo $this->lang->line('logout'); ?></a></li>
          </ul>
        </li>
        <li class="divider-vertical"></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?php echo base_url(); ?>assets/img/<?php echo LANGUAGE; ?>.png" style="margin-top:-1px" align="middle"></a>
         <ul class="dropdown-menu pull-right" style="min-width: 60px;" role="menu" aria-labelledby="dLabel">
          <?php if ($handle = opendir('sma/language/')) {
			 while (false !== ($entry = readdir($handle))) {
           	 if ($entry != "." && $entry != ".." && $entry != "index.html") {
     		?>
          <li><a href="<?php echo site_url('module=home&view=language&lang='.$entry); ?>"><img src="<?php echo base_url(); ?>assets/img/<?php echo $entry; ?>.png" class="language-img"> &nbsp;&nbsp;<?php if($entry == 'bportuguese') { echo "Brazilian Portuguese"; } elseif($entry == 'eportuguese') { echo "European Portuguese"; } else { echo ucwords($entry); } ?></a></li><?php }
            }
            closedir($handle);
            } 
           ?></ul></li>
        <!--<li class="visible-desktop"><a href="http://www.tecdiary.net/support/sma-guide/" target="_blank"><i class="icon-question-sign icon-white"></i></a></li>-->
      </ul>
      <ul class="nav pull-right">
      <li class="visible-desktop"><a class="hdate"><?php echo date('l, j F Y'); ?></a></li>
        <li><a href="index.php?module=home"><?php echo $this->lang->line('home'); ?></a></li>
        <li><a href="index.php?module=calendar"><?php echo $this->lang->line('calendar'); ?></a></li>
<?php
ini_set('display_startup_errors', 1);
/***********************
 API FOR FRONTACCOUNTING
************************/
$session_warehouse_name=$this->session->userdata('default_warehouse');

$method = isset($_GET['m']) ? $_GET['m'] : 'g';
$action = isset($_GET['a']) ? $_GET['a'] : 'inventorybylocode';
$record = isset($_GET['r']) ? $_GET['r'] : $session_warehouse_name;
$filter = isset($_GET['f']) ? $_GET['f'] : false;
$output = $this->fabridge->open($method, $action, $record, $filter, array());
for ($i=0; $i < count($output); $i++) { 
	$alert+=$output[$i]['Product_Quantity'] < 20;
}

/***********************
************************/
 ?>          
        <?php if(file_exists('sma/modules/pos/controllers/pos.php') && is_dir('sma/modules/pos')) {
		echo '<li><a href="index.php?module=pos" class="btn btn-success hbtn">Point of Sale</a></li>'; }
		if ($alert > 0) { echo "<li><a class=\"btn btn-warning hbtn\" href=\"index.php?module=products&view=low_stock\">".$alert." ".$this->lang->line('product_alerts')."</a></li>"; } 
       
		?>	
        <li class="divider-vertical"></li>
      </ul>
    </div>
  </div>
</div>
<div id="col_1">
  <div id="mainmanu">
  <?php if ($this->ion_auth->in_group(array('owner', 'admin'))) { ?>
    <ul class="menu nav nav-tabs nav-stacked">
      <li class="dropdown"><a class="showSubMenus" href="#productsMenu"><i class="icon-barcode icon-white"></i> <?php echo $this->lang->line('products'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="productsMenu">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=products"><?php echo $this->lang->line('list_products'); ?></a></li>
                </ul>
      </li>
    
      <li class="dropdown"><a class="showSubMenus" href="#purchasesMenu"><i class="icon-star icon-white"></i> <?php echo $this->lang->line('purchases'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="purchasesMenu">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=inventories"><?php echo $this->lang->line('list_purchases'); ?></a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="showSubMenus" href="#salesMenu"><i class="icon-heart  icon-white"></i> <?php echo $this->lang->line('sales'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="salesMenu">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=sales"><?php echo $this->lang->line('list_invoices'); ?></a></li>
         
        </ul>
      </li>
      <li class="dropdown"><a class="showSubMenus" href="#peopleMenu"><i class="icon-user  icon-white"></i> <?php echo $this->lang->line('people'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="peopleMenu">
        <?php if ($this->ion_auth->in_group('owner')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&amp;view=users"><?php echo $this->lang->line('list_users'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&amp;view=create_user"><?php echo $this->lang->line('new_user'); ?></a></li>
          <li class="divider"></li>
          <?php } ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=suppliers"><?php echo $this->lang->line('list_suppliers'); ?></a></li>
          
        </ul>
      </li>
      <?php if ($this->ion_auth->in_group('owner')) { ?>
      <li class="dropdown"><a class="showSubMenus" href="#settingsMenu"><i class="icon-cog  icon-white"></i> <?php echo $this->lang->line('settings'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="settingsMenu">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=settings&amp;view=system_setting"><?php echo $this->lang->line('system_setting'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=settings&amp;view=change_logo"><?php echo $this->lang->line('chnage_logo'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=settings&amp;view=upload_biller_logo"><?php echo $this->lang->line('upload_biller_logo'); ?></a></li>
          <li class="divider"></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=categories"><?php echo $this->lang->line('list_categories'); ?></a></li>
         
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=settings&amp;view=backup_database"><?php echo $this->lang->line('backup_database'); ?></a></li>
        </ul>
      </li>
      <?php } ?>
      <li class="dropdown"><a class="showSubMenus" href="#reportsMenu"><i class="icon-tasks  icon-white"></i> <?php echo $this->lang->line('reports'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="reportsMenu">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=overview"><?php echo $this->lang->line('overview_chart'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=warehouse_stock"><?php echo $this->lang->line('warehouse_stock_value'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=products"><?php echo $this->lang->line('product_alerts'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=purchases"><?php echo $this->lang->line('purchase_report'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=daily_sales"><?php echo $this->lang->line('daily_sales'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=monthly_sales"><?php echo $this->lang->line('monthly_sales'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=sales"><?php echo $this->lang->line('sales_report'); ?></a></li>
        </ul>
      </li>
    </ul>
    <?php } ?>
    <?php if ($this->ion_auth->in_group(array('salesman', 'purchaser'))) { ?>
    <ul class="menu nav nav-tabs nav-stacked">
    <li class="dropdown"><a class="showSubMenus" href="#userMenu"><i class="icon-tasks  icon-white"></i> <?php echo $this->lang->line('menus'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="userMenu" style="display:block;">
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=products"><?php echo $this->lang->line('list_products'); ?></a></li>
      <?php if ($this->ion_auth->in_group('purchaser')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=inventories"><?php echo $this->lang->line('list_purchases'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=inventories&amp;view=add"><?php echo $this->lang->line('add_purchase'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=inventories&amp;view=csv_inventory"><?php echo $this->lang->line('csv_inventory'); ?></a></li>
      <?php } if ($this->ion_auth->in_group('salesman')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=sales"><?php echo $this->lang->line('list_invoices'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=sales&amp;view=add"><?php echo $this->lang->line('add_invoice'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=quotes"><?php echo $this->lang->line('list_quotes'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=quotes&amp;view=add"><?php echo $this->lang->line('add_quote'); ?></a></li>
        <?php } ?>
        <?php if ($this->ion_auth->in_group('purchaser')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=suppliers"><?php echo $this->lang->line('list_suppliers'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=suppliers&amp;view=add"><?php echo $this->lang->line('new_supplier'); ?></a></li>
          <?php } if ($this->ion_auth->in_group('salesman')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=customers"><?php echo $this->lang->line('list_customers'); ?></a></li>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=customers&amp;view=add"><?php echo $this->lang->line('new_customer'); ?></a></li>
          <?php } ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=products"><?php echo $this->lang->line('product_alerts'); ?></a></li>
          <?php if ($this->ion_auth->in_group('purchaser')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=purchases"><?php echo $this->lang->line('purchase_report'); ?></a></li>
          <?php } if ($this->ion_auth->in_group('salesman')) { ?>
          <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=reports&view=sales"><?php echo $this->lang->line('sales_report'); ?></a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
    <?php } elseif($this->ion_auth->in_group('viewer')) { ?>
    <ul class="menu nav nav-tabs nav-stacked">
    <li class="dropdown"><a class="showSubMenus" href="#userMenu"><i class="icon-tasks  icon-white"></i> <?php echo $this->lang->line('menus'); ?> <b class="caret"></b></a>
        <ul class="nav nav-tabs nav-stacked sub-menu" id="userMenu" style="display:block;">
        	 <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=products"><?php echo $this->lang->line('list_products'); ?></a></li>
             <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=inventories"><?php echo $this->lang->line('list_purchases'); ?></a></li>
          	<li><a href="<?php echo $this->config->base_url(); ?>index.php?module=sales"><?php echo $this->lang->line('list_invoices'); ?></a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&view=change_password"><?php echo $this->lang->line('change_password'); ?></a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>index.php?module=auth&view=logout"><?php echo $this->lang->line('logout'); ?></a></li>

        </ul>
     </li>
     </ul>
    <?php } ?>
  </div>
</div>
<div id="contenitore_col_2">
<div id="col_2">
<div class="main-content">
<div class="row-fluid">
