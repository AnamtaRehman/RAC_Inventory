<?php
  $page_title = 'Add Voucher Record';
  require_once('includes/load.php');
?>
<?php
  if(isset($_POST['add_voucher_record'])){

   $req_fields = array('date', 'voucher_number', 'mode', 'rac_in_date', 'warranty_time_in_year', 'warranty_valid_upto_date', 'sender_name', 'sender_address', 'gst_number', 'state', 'total_amount_before_tax', 'gst_amount', 'total', 'item_temp_loan','loan_upto_date','item_description','upload_voucher','remarks' );
   validate_fields($req_fields);

   if(empty($errors)){
      $date= remove_junk($db->escape($_POST['date']));
       $voucher_number= remove_junk($db->escape($_POST['voucher_number']));
       $mode= remove_junk($db->escape($_POST['mode']));
       $rac_in_date= remove_junk($db->escape($_POST['rac_in_date']));
       $warranty_time_in_year= remove_junk($db->escape($_POST['warranty_time_in_year']));
       $warranty_valid_upto_date= remove_junk($db->escape($_POST['warranty_valid_upto_date']));
       $sender_name= remove_junk($db->escape($_POST['sender_name']));
       $sender_address= remove_junk($db->escape($_POST['sender_address']));
       $gst_number= remove_junk($db->escape($_POST['gst_number']));
       $state= remove_junk($db->escape($_POST['state']));
       $total_amount_before_tax= remove_junk($db->escape($_POST['total_amount_before_tax']));
       $gst_amount= remove_junk($db->escape($_POST['gst_amount']));
       $total= remove_junk($db->escape($_POST['total']));
       $item_temp_loan= remove_junk($db->escape($_POST['item_temp_loan']));
       $loan_upto_date= remove_junk($db->escape($_POST['loan_upto_date']));
       $item_description= remove_junk($db->escape($_POST['item_description']));
       $upload_voucher= remove_junk($db->escape($_POST['upload_voucher']));
       $remarks= remove_junk($db->escape($_POST['remarks']));
        $query = "INSERT INTO voucher_records (";
        $query .="date, voucher_number, mode, rac_in_date, warranty_time_in_year, warranty_valid_upto_date, sender_name, sender_address, gst_number, state, total_amount_before_tax, gst_amount, total, item_temp_loan,loan_upto_date,item_description,upload_voucher,remarks";
        $query .=") VALUES (";
        $query .=" '{$date}', '{$voucher_number}', '{$mode}', '{$rac_in_date}','{$warranty_time_in_year}','{$warranty_valid_upto_date}','{$sender_name}','{$sender_address}','{$gst_number}','{$state}','{$total_amount_before_tax}','{$gst_amount}','{$total}','{$item_temp_loan}' ,'{$loan_upto_date}','{$item_description}','{$upload_voucher}' ,'{$remarks}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Voucher Record has been added successfully! ");
          redirect('add_voucher_record.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry, failed to add the user!');
          redirect('add_voucher_record.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_voucher_record.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-plus"></span>
          <span>Add Voucher Record</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_voucher_record.php">
            
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" >
            <div class="form-group">
                <label for="voucher_number">Voucher No.</label>
                <input type="text" class="form-control" name ="voucher_number"  placeholder="Voucher No.">
            </div>
            <div class="form-group">
                <label for="mode">Mode</label>
                <input type="text" class="form-control" name="mode" placeholder="Mode">
            </div>
            <div class="form-group">
                <label for="rac_in_date">RAC in date</label>
                <input type="date" class="form-control" name="rac_in_date" >
            </div>
            <div class="form-group">
                <label for="warranty_time_in_year">Warranty Time (in years)</label>
                <input type="text" class="form-control" name="warranty_time_in_year" placeholder="Warranty Time (in years)">
            </div>
            <div class="form-group">
                <label for="warranty_valid_upto_date">Warranty Valid upto Date</label>
                <input type="date" class="form-control" name="warranty_valid_upto_date" >
            </div>
            <div class="form-group">
                <label for="sender_name">Sender Name</label>
                <input type="text" class="form-control" name="sender_name" placeholder="Sender Name">
            </div>
            <div class="form-group">
                <label for="sender_address">Sender Address</label>
                <input type="text" class="form-control" name="sender_address" placeholder="Sender Address">
            </div>
            <div class="form-group">
                <label for="gst_number">GST No.</label>
                <input type="text" class="form-control" name="gst_number" placeholder="GST No.">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" placeholder="State">
            </div>
            <div class="form-group">
                <label for="total_amount_before_tax">Total Amount before Tax (in Rs.)</label>
                <input type="text" class="form-control" name="total_amount_before_tax" placeholder="Total Amount before tax (in Rs.)">
            </div>
            <div class="form-group">
                <label for="gst_amount">GST Amount(in Rs.)</label>
                <input type="text" class="form-control" name="gst_amount" placeholder="GST Amount(in Rs.)">
            </div>
            <div class="form-group">
                <label for="total">Total (in Rs.)</label>
                <input type="text" class="form-control" name="total" placeholder="Total (in Rs.)">
            </div>
      
            <div class="form-group">
                <label for="item_temp_loan">Item Temp Loan</label>
                <input type="text" class="form-control" name="item_temp_loan" placeholder="Item Temp Loan">
            </div>
            <div class="form-group">
                <label for="loan_upto_date">Loan upto Date</label>
                <input type="date" class="form-control" name="loan_upto_date" >
            </div>
            <div class="form-group">
                <label for="sender_name">Item Description</label>
                <input type="text" class="form-control" name="item_description" placeholder="Item Description">
            </div>
            <div class="form-group">
        <label for="upload_voucher">Upload Voucher Image</label>
        <input type="file" class="form-control" name="upload_voucher" accept="image/*">
    </div>
    
  
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" name="remarks" placeholder="remarks">
            </div>
         
            <div class="form-group clearfix">
              <button type="submit" name="add_voucher_record" class="btn btn-primary">Add Record</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
