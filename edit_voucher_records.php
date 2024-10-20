<?php
  $page_title = 'Edit Voucher Records';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_voucher = find_by_id('voucher_records',(int)$_GET['id']);
  if(!$e_voucher){
    $session->msg("d","Missing Voucher No.");
    redirect('voucher_records.php');
  }
?>
<?php
//Update User basic info
if (isset($_POST['update'])) {
    $req_fields = array('id', 'date', 'mode', 'rac_in_date', 'warranty_time_in_year', 'warranty_valid_upto_date', 'sender_name', 'sender_address', 'gst_number', 'state', 'total_amount_before_tax', 'gst_amount', 'total', 'item_temp_loan', 'loan_upto_date', 'item_description', 'upload_voucher', 'remarks');
    validate_fields($req_fields);
    
    if (empty($errors)) {
        $id = remove_junk($db->escape($_POST['id']));
        $date = remove_junk($db->escape($_POST['date']));
        $id = remove_junk($db->escape($_POST['id']));
        $mode = remove_junk($db->escape($_POST['mode']));
        $rac_in_date = remove_junk($db->escape($_POST['rac_in_date']));
        $warranty_time_in_year = remove_junk($db->escape($_POST['warranty_time_in_year']));
        $warranty_valid_upto_date = remove_junk($db->escape($_POST['warranty_valid_upto_date']));
        $sender_name = remove_junk($db->escape($_POST['sender_name']));
        $sender_address = remove_junk($db->escape($_POST['sender_address']));
        $gst_number = remove_junk($db->escape($_POST['gst_number']));
        $state = remove_junk($db->escape($_POST['state']));
        $total_amount_before_tax = remove_junk($db->escape($_POST['total_amount_before_tax']));
        $gst_amount = remove_junk($db->escape($_POST['gst_amount']));
        $total = remove_junk($db->escape($_POST['total']));
        $item_temp_loan = remove_junk($db->escape($_POST['item_temp_loan']));
        $loan_upto_date = remove_junk($db->escape($_POST['loan_upto_date']));
        $item_description = remove_junk($db->escape($_POST['item_description']));
        $upload_voucher = remove_junk($db->escape($_POST['upload_voucher']));
        $remarks = remove_junk($db->escape($_POST['remarks']));

        $sql = "UPDATE voucher_records SET 
                    date = '{$date}', 
                    id = '{$id}', 
                    mode = '{$mode}', 
                    rac_in_date = '{$rac_in_date}', 
                    warranty_time_in_year = '{$warranty_time_in_year}', 
                    warranty_valid_upto_date = '{$warranty_valid_upto_date}', 
                    sender_name = '{$sender_name}', 
                    sender_address = '{$sender_address}', 
                    gst_number = '{$gst_number}', 
                    state = '{$state}', 
                    total_amount_before_tax = '{$total_amount_before_tax}', 
                    gst_amount = '{$gst_amount}', 
                    total = '{$total}', 
                    item_temp_loan = '{$item_temp_loan}', 
                    loan_upto_date = '{$loan_upto_date}', 
                    item_description = '{$item_description}', 
                    upload_voucher = '{$upload_voucher}', 
                    remarks = '{$remarks}' 
                WHERE id = '{$db->escape($id)}'";
        
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Voucher record updated successfully!");
            redirect('voucher_records.php?id=' . (int)$e_voucher['id'], false);
        } else {
            $session->msg('d', 'Sorry, failed to update voucher record!');
            redirect('edit_voucher_records.php?id=' . (int)$e_voucher['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_voucher_records.php?id=' . (int)$e_voucher['id'], false);
    }
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12"><?php echo display_msg($msg); ?></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-pencil"></span>
                    Update Voucher Record for Voucher No: <?php echo remove_junk(ucwords($e_voucher['id'])); ?>
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_voucher_records.php?id=<?php echo (int)$e_voucher['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="id" class="control-label">Voucher No.</label>
                        <input type="text" class="form-control" name="id" value="<?php echo (int)$e_voucher['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo remove_junk($e_voucher['date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="mode">Mode</label>
                        <input type="text" class="form-control" name="mode" value="<?php echo remove_junk($e_voucher['mode']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="rac_in_date">RAC In Date</label>
                        <input type="date" class="form-control" name="rac_in_date" value="<?php echo remove_junk($e_voucher['rac_in_date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="warranty_time_in_year">Warranty Time (in years)</label>
                        <input type="text" class="form-control" name="warranty_time_in_year" value="<?php echo remove_junk($e_voucher['warranty_time_in_year']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="warranty_valid_upto_date">Warranty Valid Upto Date</label>
                        <input type="date" class="form-control" name="warranty_valid_upto_date" value="<?php echo remove_junk($e_voucher['warranty_valid_upto_date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="sender_name">Sender Name</label>
                        <input type="text" class="form-control" name="sender_name" value="<?php echo remove_junk($e_voucher['sender_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="sender_address">Sender Address</label>
                        <input type="text" class="form-control" name="sender_address" value="<?php echo remove_junk($e_voucher['sender_address']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="gst_number">GST No.</label>
                        <input type="text" class="form-control" name="gst_number" value="<?php echo remove_junk($e_voucher['gst_number']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" value="<?php echo remove_junk($e_voucher['state']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="total_amount_before_tax">Total Amount Before Tax (in Rs.)</label>
                        <input type="text" class="form-control" name="total_amount_before_tax" value="<?php echo remove_junk($e_voucher['total_amount_before_tax']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="gst_amount">GST Amount (in Rs.)</label>
                        <input type="text" class="form-control" name="gst_amount" value="<?php echo remove_junk($e_voucher['gst_amount']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="total">Total (in Rs.)</label>
                        <input type="text" class="form-control" name="total" value="<?php echo remove_junk($e_voucher['total']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="item_temp_loan">Item Temp Loan</label>
                        <input type="text" class="form-control" name="item_temp_loan" value="<?php echo remove_junk($e_voucher['item_temp_loan']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="loan_upto_date">Loan Upto Date</label>
                        <input type="date" class="form-control" name="loan_upto_date" value="<?php echo remove_junk($e_voucher['loan_upto_date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="item_description">Item Description</label>
                        <input type="text" class="form-control" name="item_description" value="<?php echo remove_junk($e_voucher['item_description']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="upload_voucher">Upload Voucher</label>
                        <input type="text" class="form-control" name="upload_voucher" value="<?php echo remove_junk($e_voucher['upload_voucher']); ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="remarks"><?php echo remove_junk($e_voucher['remarks']); ?></textarea>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info pull-right">Update Voucher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>