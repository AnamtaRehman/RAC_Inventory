<?php
  $page_title = 'Edit Usage Record';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $e_usage = find_by_id('usage_records',(int)$_GET['id']);
  if(!$e_usage){
    $session->msg("d","Missing RAC Serial No.");
    redirect('usage_records.php');
  }
?>
<?php
if (isset($_POST['update'])) {
    $req_fields = array('oem_sr_no', 'id', 'name_as_per_store', 'user_id', 'user_name', 'user_email', 'room_no', 'div_head_name', 'inventory_holder_name', 'reason_for_item_transfer', 'upload_authority_letter', 'from_date', 'to_date', 'presently_using', 'remarks');
    validate_fields($req_fields);

    if (empty($errors)) {
        $oem_sr_no = remove_junk($db->escape($_POST['oem_sr_no']));
        $id = remove_junk($db->escape($_POST['id']));
        $name_as_per_store = remove_junk($db->escape($_POST['name_as_per_store']));
        $user_id = remove_junk($db->escape($_POST['user_id']));
        $user_name = remove_junk($db->escape($_POST['user_name']));
        $user_email = remove_junk($db->escape($_POST['user_email']));
        $room_no = remove_junk($db->escape($_POST['room_no']));
        $div_head_name = remove_junk($db->escape($_POST['div_head_name']));
        $inventory_holder_name = remove_junk($db->escape($_POST['inventory_holder_name']));
        $reason_for_item_transfer = remove_junk($db->escape($_POST['reason_for_item_transfer']));
        $upload_authority_letter = remove_junk($db->escape($_POST['upload_authority_letter']));
        $from_date = remove_junk($db->escape($_POST['from_date']));
        $to_date = remove_junk($db->escape($_POST['to_date']));
        $presently_using = remove_junk($db->escape($_POST['presently_using']));
        $remarks = remove_junk($db->escape($_POST['remarks']));

        $sql = "UPDATE usage_records SET 
                    oem_sr_no = '{$oem_sr_no}', 
                    name_as_per_store = '{$name_as_per_store}', 
                    user_id = '{$user_id}', 
                    user_name = '{$user_name}', 
                    user_email = '{$user_email}', 
                    room_no = '{$room_no}', 
                    div_head_name = '{$div_head_name}', 
                    inventory_holder_name = '{$inventory_holder_name}', 
                    reason_for_item_transfer = '{$reason_for_item_transfer}', 
                    upload_authority_letter = '{$upload_authority_letter}', 
                    from_date = '{$from_date}', 
                    to_date = '{$to_date}', 
                    presently_using = '{$presently_using}', 
                    remarks = '{$remarks}' 
                WHERE id = '{$db->escape($id)}'";

        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Usage record updated successfully!");
            redirect('usage_records.php?id=' . (int)$e_usage['id'], false);
        } else {
            $session->msg('d', 'Sorry, failed to update usage record!');
            redirect('edit_usage_record.php?id=' . (int)$e_usage['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_usage_record.php?id=' . (int)$e_usage['id'], false);
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
                    Update Usage Record for RAC Serial No: <?php echo remove_junk(ucwords($e_usage['id'])); ?>
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_usage_record.php?id=<?php echo (int)$e_usage['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="oem_sr_no" class="control-label">OEM Serial Number</label>
                        <input type="text" class="form-control" name="oem_sr_no" value="<?php echo remove_junk($e_usage['oem_sr_no']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="id" class="control-label">RAC Serial No. </label>
                        <input type="text" class="form-control" name="id" value="<?php echo (int)$e_usage['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name_as_per_store">Name as per Store</label>
                        <input type="text" class="form-control" name="name_as_per_store" value="<?php echo remove_junk($e_usage['name_as_per_store']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input type="text" class="form-control" name="user_id" value="<?php echo remove_junk($e_usage['user_id']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control" name="user_name" value="<?php echo remove_junk($e_usage['user_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="user_email">User Email</label>
                        <input type="email" class="form-control" name="user_email" value="<?php echo remove_junk($e_usage['user_email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="room_no">Room No.</label>
                        <input type="text" class="form-control" name="room_no" value="<?php echo remove_junk($e_usage['room_no']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="div_head_name">Division Head Name</label>
                        <input type="text" class="form-control" name="div_head_name" value="<?php echo remove_junk($e_usage['div_head_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="inventory_holder_name">Inventory Holder Name</label>
                        <input type="text" class="form-control" name="inventory_holder_name" value="<?php echo remove_junk($e_usage['inventory_holder_name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="reason_for_item_transfer">Reason for Item Transfer</label>
                        <textarea class="form-control" name="reason_for_item_transfer"><?php echo remove_junk($e_usage['reason_for_item_transfer']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="upload_authority_letter">Upload Authority Letter</label>
                        <input type="text" class="form-control" name="upload_authority_letter" value="<?php echo remove_junk($e_usage['upload_authority_letter']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="from_date">From Date</label>
                        <input type="date" class="form-control" name="from_date" value="<?php echo remove_junk($e_usage['from_date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="to_date">To Date</label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo remove_junk($e_usage['to_date']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="presently_using">Presently Using</label>
                        <input type="text" class="form-control" name="presently_using" value="<?php echo remove_junk($e_usage['presently_using']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="remarks"><?php echo remove_junk($e_usage['remarks']); ?></textarea>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info pull-right">Update Usage Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>
