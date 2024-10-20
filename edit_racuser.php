<?php
  $page_title = 'Edit RAC User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('rac_users',(int)$_GET['id']);
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('users.php');
  }
?>
<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('id', 'Name', 'Designation', 'Mobile_no', 'Email_id', 'Dob', 'PIS', 'Head', 'Emp_type', 'Status' );
    validate_fields($req_fields);
    if(empty($errors)){
        $id= remove_junk($db->escape($_POST['id']));
        $Name= remove_junk($db->escape($_POST['Name']));
        $Designation= remove_junk($db->escape($_POST['Designation']));
        $Mobile_no= remove_junk($db->escape($_POST['Mobile_no']));
        $Email_id= remove_junk($db->escape($_POST['Email_id']));
        $Dob= remove_junk($db->escape($_POST['Dob']));
        $PIS= remove_junk($db->escape($_POST['PIS']));
        $Head= remove_junk($db->escape($_POST['Head']));
        $Emp_type= remove_junk($db->escape($_POST['Emp_type']));
        $Status= remove_junk($db->escape($_POST['Status']));
    
            $sql = "UPDATE rac_users SET Name ='{$Name}', Designation ='{$Designation}',Mobile_no='{$Mobile_no}',Email_id='{$Email_id}',Dob='{$Dob}',PIS='{$PIS}',Head='{$Head}',Emp_type='{$Emp_type}',Status='{$Status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"User details Updated ");
            redirect('users.php?id='.(int)$e_user['id'], false);
            
          } else {
            $session->msg('d',' Sorry, failed to update user details!');
            redirect('edit_racuser.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_racuser.php?id='.(int)$e_user['id'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-pencil"></span>
          Update Details for <?php echo remove_junk(ucwords($e_user['Name'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_racuser.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
            <div class="form-group">
    <label for="id" class="control-label">Id</label>
    <input type="text" class="form-control" name="id" value="<?php echo (int)$e_user['id']; ?>" readonly>
</div>

                  <label for="Name" class="control-label">Name</label>
                  <input type="text" class="form-control" name="Name" value="<?php echo remove_junk(ucwords($e_user['Name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="Designation" class="control-label">Designation</label>
                  <input type="text" class="form-control" name="Designation" value="<?php echo remove_junk(ucwords($e_user['Designation'])); ?>">
            </div>
            <div class="form-group">
                  <label for="Mobile_no" class="control-label">Mobile_no</label>
                  <input type="text" class="form-control" name="Mobile_no" value="<?php echo remove_junk($e_user['Mobile_no']); ?>">
            </div>
            <div class="form-group">
                  <label for="Email_id" class="control-label">Email id</label>
                  <input type="email" class="form-control" name="Email_id" value="<?php echo remove_junk($e_user['Email_id']); ?>">
            </div>
            <div class="form-group">
                <label for="Dob">Dob</label>
                <input type="date" class="form-control" name="Dob" value="<?php echo remove_junk($e_user['Dob']); ?>">
            </div>
            <div class="form-group">
                  <label for="PIS" class="control-label">PIS</label>
                  <input type="text" class="form-control" name="PIS" value="<?php echo remove_junk(ucwords($e_user['PIS'])); ?>">
            </div>
            <div class="form-group">
        <label for="Head">Head</label>
        <select class="form-control" name="Head" id="Head">
            <option value="Yes" <?php if($e_user['Head'] == 'Yes') echo 'selected'; ?>>Yes</option>
            <option value="No" <?php if($e_user['Head'] == 'No') echo 'selected'; ?>>No</option>
        </select>
    </div>

    <div class="form-group">
        <label for="Emp_type">Emp_type</label>
        <select class="form-control" name="Emp_type" id="Emp_type">
            <option value="DRDO" <?php if($e_user['Emp_type'] == 'DRDO') echo 'selected'; ?>>DRDO</option>
            <option value="AFHQ" <?php if($e_user['Emp_type'] == 'AFHQ') echo 'selected'; ?>>AFHQ</option>
            <option value="Other" <?php if($e_user['Emp_type'] == 'Other') echo 'selected'; ?>>Other</option>
        </select>
    </div>

    <div class="form-group">
        <label for="Status">Status</label>
        <select class="form-control" name="Status" id="Status">
            <option value="Active" <?php if($e_user['Status'] == 'Active') echo 'selected'; ?>>Active</option>
            <option value="Inactive" <?php if($e_user['Status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
        </select>
    </div>
            
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Update</button>
            </div>
        </form>
       </div>
     </div>
  </div>


 </div>
<?php include_once('layouts/footer.php'); ?>