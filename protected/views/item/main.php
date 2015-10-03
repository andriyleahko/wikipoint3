<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
	
<?php if((cAlias()=='flats' || cAlias()=='rooms') && aAlias()=='update' || (cAlias()=='objectsAppartment' && aAlias()=='update')){ ?>
    <script type="text/javascript" src="/js/jquery.js"></script>
<?php } 
$on=file_get_contents('forparsing.txt');
if($on=='1'){
	$ch='checked';
}
?>
        
        <!-- Style -->
        <style type="text/css">
		@import url("<?= $this->path; ?>css/bootstrap.css");
		@import url('<?= $this->path; ?>css/custom.css');
		@import url('<?= $this->path; ?>fonts/font.css');
		@import url('<?= $this->path; ?>css/dropdown.css');
		@import url('<?= $this->path; ?>css/bootstrap-datetimepicker.min.css');
        </style>
    <script type="text/javascript" src="<?= $this->path; ?>js/print_r.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php //echo $this->path; ?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
	<?php 
    /*<link rel="top icon" href="/images/topicon.png">*/
	?>
    <title><?=Yii::t('app','Кабинет')?> </title>      
</head>

<body>
	<div class="show-img"></div>
    <div class="white_bg" style="width: 762px; left: 210px;"></div>
    <div class="top-bg"></div>
    <!-- Navbar
================================================== -->
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <form action="<?=$this->createUrl('/admin/logout')?>" method="get" class="navbar-form pull-right login_logout_form">
            <span class="help-inline">Привет <?=Yii::app()->user->userArray['name']?></span> 
            <input type="submit" class="btn" value="Выход"/>
            <div style='margin-top:10px;'>
				<label id='pwiki'><input id='prswiki' type='checkbox' <?php echo $ch;?> > включить парсинг данных с вики</label>
			</div>
          </form>          
        </div>
      </div>
    </div>
    <div class="container">


<div class="span19">
      <div class="breadcrumbs_sect">
        <ul class="breadcrumb">        </ul>        
      </div>
<?php // Main Content ?>
        <?= $content; ?>

</div>
</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?= $this->path; ?>js/jquery.tablesorter.js"></script>
    <script type="text/javascript" id="js">
      $(document).ready(function() {

  		$('#pwiki').click(function(){
  	  		var onwiki=0;
			if($('#prswiki').prop('checked')){
				onwiki=1;
			}else{
				onwiki=0;
			}
		    $.ajax({
		        url: "/site/onparse", // show simular
		        dataType: 'json',
		        type: 'GET',
		        data: 'onwiki='+onwiki,
		        success: function (data) {
		            
		        }
		    });			
		});	
    	  
           
          $("table.result_sort").tablesorter({ 
              // pass the headers argument and assing a object 
              headers: {  
                  0: {sorter: false },
                  1: {sorter: false },
                  3: {sorter: false },
                  4: {sorter: false },
                  5: {sorter: false },
                  6: {sorter: false },
                  7: {sorter: false },
                  8: {sorter: false },
                  9: {sorter: false }
              } 
          }); 
      });
    </script>
    <script src="<?= $this->path; ?>js/bootstrap-transition.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-alert.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-modal.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-dropdown.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-dropdown2.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-scrollspy.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-tab.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-tooltip.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-popover.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-button.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-collapse.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-carousel.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-typeahead.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-affix.js"></script>


    <script src="<?= $this->path; ?>js/use.js"></script>
    <script src="<?= $this->path; ?>js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $('#datetimepicker').datetimepicker({
          pickTime: false
        });
      });
    </script>    
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="<?= $this->path; ?>js/cors/jquery.xdr-transport.js"></script><![endif]--> 


</body>

</html> 