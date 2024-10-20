<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('itemcategories'); //categories
 $c_product       = count_by_serialno('add_items'); //additems
 $c_voucher = count_by_id('voucher_records');
 $c_user          = count_by_id('rac_users'); //racusers
 
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
<div class="col-md-6" id="message-container">
    <?php echo display_msg($msg); ?>
</div>

<script>
    // Set the duration for the timer in milliseconds (2000ms = 2 seconds)
    const duration = 3500; 

    // Set a timeout to hide the message after the duration
    setTimeout(() => {
        const messageContainer = document.getElementById('message-container');
        if (messageContainer) {
            messageContainer.style.display = 'none'; // Hide the message
        }
    }, duration);
</script>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">RAC Users</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="itemcategories.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-th-large"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categories</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="add_items.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue2">
          <i class="glyphicon glyphicon-plus"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Items</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="b.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-duplicate"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"><?php  echo $c_voucher['total']; ?> </h2>
          <p class="text-muted">Voucher Records</p>
        </div>
       </div>
    </div>
	</a>
</div>
  
  



<?php include_once('layouts/footer.php'); ?>
