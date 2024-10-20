<?php
  $page_title = 'Add RAC User';
  require_once('includes/load.php');
?>
<?php
  if(isset($_POST['add_racuser'])){

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

       $check_query = "SELECT id FROM rac_users WHERE id = '{$id}' LIMIT 1";
       $check_result = $db->query($check_query);
 
       if($db->num_rows($check_result) > 0){
         // ID already exists, handle it
         $session->msg('d','Sorry, this ID already exists. Please use a different ID.');
         redirect('add_racuser.php', false);
       }
       else{
        $query = "INSERT INTO rac_users (";
        $query .="id, Name, Designation, Mobile_no, Email_id, Dob, PIS, Head, Emp_type, Status";
        $query .=") VALUES (";
        $query .=" '{$id}', '{$Name}', '{$Designation}', '{$Mobile_no}','{$Email_id}','{$Dob}','{$PIS}','{$Head}','{$Emp_type}','{$Status}' ";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User has been added successfully! ");
          redirect('users.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry, failed to add the user!');
          redirect('add_racuser.php', false);
        }
   }
   } else {
     $session->msg("d", $errors);
      redirect('add_racuser.php',false);
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
          <span>Add New User</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_racuser.php">
            
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" name="id" placeholder="id">
            </div>
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name ="Name"  placeholder="Name">
            </div>
            <div class="form-group">
                <label for="Designation">Designation</label>
                <input type="text" class="form-control" name="Designation" placeholder="Designation">
            </div>
            <div class="form-group">
                <label for="Mobile_no">Mobile_no</label>
                <input type="text" class="form-control" name="Mobile_no" placeholder="Mobile_no">
            </div>
            <div class="form-group">
                <label for="Email_id">Email id</label>
                <input type="email" class="form-control" name="Email_id" placeholder="Email_id">
            </div>
            <div class="form-group">
                <label for="Dob">Dob</label>
                <input type="date" class="form-control" name="Dob" >
            </div>
            <div class="form-group">
                <label for="PIS">PIS</label>
                <input type="text" class="form-control" name="PIS" placeholder="PIS">
            </div>
            <div class="form-group">
    <label for="Head">Head</label>
    <select class="form-control" name="Head" id="Head">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
</div>
            
            <div class="form-group">
    <label for="Emp_type">Emp_type</label>
    <select class="form-control" name="Emp_type" id="Emp_type">
        <option value="DRDO">DRDO</option>
        <option value="AFHQ">AFHQ</option>
        <option value="Other">Other</option>
    </select>
</div>
<div class="form-group">
    <label for="Status">Status</label>
    <select class="form-control" name="Status" id="Status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
</div>
            <div class="form-group clearfix">
              <button type="submit" name="add_racuser" class="btn btn-primary">Add User</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
