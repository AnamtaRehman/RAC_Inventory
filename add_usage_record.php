<?php
  $page_title = 'Add a Record';
  require_once('includes/load.php');
?>
<?php
  if(isset($_POST['add_usage_record'])){
    $req_fields = array('oem_sr_no', 'id', 'name_as_per_store', 'user_id', 'user_name', 'user_email', 'room_no', 'div_head_name', 'inventory_holder_name', 'reason_for_item_transfer', 'upload_authority_letter', 'from_date', 'to_date', 'presently_using', 'remarks' );
    validate_fields($req_fields);
    if(empty($errors)){
         $oem_sr_no= remove_junk($db->escape($_POST['oem_sr_no']));
         $id= remove_junk($db->escape($_POST['id']));
         $name_as_per_store= remove_junk($db->escape($_POST['name_as_per_store']));
         $user_id= remove_junk($db->escape($_POST['user_id']));
         $user_name= remove_junk($db->escape($_POST['user_name']));
         $user_email= remove_junk($db->escape($_POST['user_email']));
         $room_no= remove_junk($db->escape($_POST['room_no']));
         $div_head_name= remove_junk($db->escape($_POST['div_head_name']));
         $inventory_holder_name= remove_junk($db->escape($_POST['inventory_holder_name']));
         $reason_for_item_transfer= remove_junk($db->escape($_POST['reason_for_item_transfer']));
         $upload_authority_letter= remove_junk($db->escape($_POST['upload_authority_letter']));
         $from_date= remove_junk($db->escape($_POST['from_date']));
         $to_date= remove_junk($db->escape($_POST['to_date']));
         $presently_using= remove_junk($db->escape($_POST['presently_using']));
         $remarks= remove_junk($db->escape($_POST['remarks']));
         
         $check_query = "SELECT id FROM usage_records WHERE id = '{$id}' LIMIT 1";
         $check_result = $db->query($check_query);
   
         if($db->num_rows($check_result) > 0){
           // ID already exists, handle it
           $session->msg('d','Sorry, this Sr. No. already exists. Please use a different Sr. No. by RAC.');
           redirect('add_usage_record.php', false);
         }
         else{
          $query = "INSERT INTO usage_records (";
          $query.="oem_sr_no, id, name_as_per_store, user_id, user_name, user_email, room_no, div_head_name, inventory_holder_name, reason_for_item_transfer, upload_authority_letter, from_date, to_date, presently_using, remarks";
          $query .=") VALUES (";
          $query .=" '{$oem_sr_no}', '{$id}', '{$name_as_per_store}', '{$user_id}', '{$user_name}', '{$user_email}', '{$room_no}', '{$div_head_name}', '{$inventory_holder_name}', '{$reason_for_item_transfer}', '{$upload_authority_letter}', '{$from_date}', '{$to_date}', '{$presently_using}', '{$remarks}' ";
          $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User has been added successfully! ");
          redirect('usage_records.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry, failed to add the user!');
          redirect('add_usage_record.php', false);
        }
   }
   } else {
     $session->msg("d", $errors);
      redirect('add_usage_record.php',false);
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
          <span>New Usage Record</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_usage_record.php">
            
            <div class="form-group">
                <label for="oem_sr_no">OEM Serial No.</label>
                <input type="text" class="form-control" name="oem_sr_no" placeholder="oem_sr_no">
            </div>
            <div class="form-group">
                <label for="id">RAC Serial No.</label>
                <input type="text" class="form-control" name ="id"  placeholder="id">
            </div>
            <div class="form-group">
                <label for="name_as_per_store">name as per Store</label>
                <input type="text" class="form-control" name="name_as_per_store" placeholder="name_as_per_store">
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <input type="text" class="form-control" name="user_id" placeholder="user_id">
            </div>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" name="user_name" placeholder="user_name">
            </div>
            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" class="form-control" name="user_email" placeholder="user_email">
            </div>
            <div class="form-group">
                <label for="room_no">Room No.</label>
                <input type="text" class="form-control" name="room_no" placeholder="room_no">
            </div>
            <div class="form-group">
                <label for="div_head_name">Div. Head Name</label>
                <input type="text" class="form-control" name="div_head_name" placeholder="div_head_name">
            </div>
            <div class="form-group">
                <label for="inventory_holder_name">Inventory Holder Name</label>
                <input type="text" class="form-control" name="inventory_holder_name" placeholder="inventory_holder_name">
            </div>
            <div class="form-group">
                <label for="reason_for_item_transfer">Reason for Item Transfer</label>
                <input type="text" class="form-control" name="reason_for_item_transfer" placeholder="reason_for_item_transfer">
            </div>
            <div class="form-group">
            <label for="upload_authority_letter">Upload Authority Letter</label>
            <input type="file" class="form-control" name="upload_authority_letter" accept="image/*">
        </div>
            <div class="form-group">
                <label for="from_date">From Date</label>
                <input type="date" class="form-control" name="from_date" >
            </div>
            <div class="form-group">
                <label for="to_date">To Date</label>
                <input type="date" class="form-control" name="to_date" >
            </div>
            <div class="form-group">
    <label for="presently_using">Presently Using?</label>
    <select class="form-control" name="presently_using" id="presently_using">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
</div>
<div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" name="remarks" placeholder="remarks">
            </div>
            
           
            <div class="form-group clearfix">
              <button type="submit" name="add_usage_record" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>