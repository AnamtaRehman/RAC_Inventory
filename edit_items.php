<?php
  $page_title = 'Edit Item details';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_item = find_by_id('add_items',(int)$_GET['id']);
  if(!$e_item){
    $session->msg("d","Missing serial no. by RAC");
    redirect('add_items.php');
  }
?>
<?php
  if(isset($_POST['update'])){
   $req_fields = array('name', 'name_as_per_store','type','sub_type','make','model_number','oem','internet_connectivity','wifi','bluetooth','mac_address','network_port','configuration','processor','ram_type','ram_size','ssd_size','hd_size','windows','oem_warranty','id','remarks');
   validate_fields($req_fields);
   if(empty($errors)){
    $name= remove_junk($db->escape($_POST['name']));
    $name_as_per_store= remove_junk($db->escape($_POST['name_as_per_store']));
    $type= remove_junk($db->escape($_POST['type']));
    $sub_type= remove_junk($db->escape($_POST['sub_type']));
    $make= remove_junk($db->escape($_POST['make']));
    $model_number= remove_junk($db->escape($_POST['model_number']));
    $oem= remove_junk($db->escape($_POST['oem']));
    $internet_connectivity= remove_junk($db->escape($_POST['internet_connectivity']));
    $wifi= remove_junk($db->escape($_POST['wifi']));
    $bluetooth= remove_junk($db->escape($_POST['bluetooth']));
    $mac_address= remove_junk($db->escape($_POST['mac_address']));
    $network_port= remove_junk($db->escape($_POST['network_port']));
    $configuration= remove_junk($db->escape($_POST['configuration']));
    $processor= remove_junk($db->escape($_POST['processor']));
    $ram_type= remove_junk($db->escape($_POST['ram_type']));
    $ram_size= remove_junk($db->escape($_POST['ram_size']));
    $ssd_size= remove_junk($db->escape($_POST['ssd_size']));
    $hd_size= remove_junk($db->escape($_POST['hd_size']));
    $windows= remove_junk($db->escape($_POST['windows']));
    $oem_warranty= remove_junk($db->escape($_POST['oem_warranty']));
    $id= remove_junk($db->escape($_POST['id']));
    $remarks= remove_junk($db->escape($_POST['remarks']));
    $sql = "UPDATE add_items SET name ='{$name}', name_as_per_store ='{$name_as_per_store}',type='{$type}',sub_type='{$sub_type}',make='{$make}',model_number='{$model_number}',oem='{$oem}',internet_connectivity='{$internet_connectivity}',wifi='{$wifi}', bluetooth='{$bluetooth}', mac_address ='{$mac_address}',network_port='{$network_port}',configuration='{$configuration}',processor='{$processor}',ram_type='{$ram_type}',ram_size='{$ram_size}',ssd_size='{$ssd_size}',hd_size='{$hd_size}',windows='{$windows}',oem_warranty='{$oem_warranty}',id='{$id}',remarks='{$remarks}' WHERE id='{$db->escape($id)}'";
    $result = $db->query($sql);
     if($result && $db->affected_rows() === 1){
       $session->msg('s',"Item details Updated ");
       redirect('add_items.php?id='.(int)$e_item['id'], false);
       
     } else {
       $session->msg('d',' Sorry, failed to update item details!');
       redirect('edit_items.php?id='.(int)$e_item['id'], false);
     }
} else {
 $session->msg("d", $errors);
 redirect('edit_items.php?id='.(int)$e_item['id'],false);
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
          <span class="glyphicon glyphicon-th"></span>
          Update Item Details for Serial No: <?php echo remove_junk(ucwords($e_item['id'])); ?>
        </strong>
        </div>
        <div class="panel-body">
   
        <form method="post" action="edit_items.php?id=<?php echo (int)$e_item['id']; ?>" class="clearfix">
        <div class="form-group">
            <div class="form-group">
                <label for="id">Sr. no. by RAC</label>
                <input type="text" class="form-control" name="id" value="<?php echo remove_junk($e_item['id']); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo remove_junk($e_item['name']); ?>">
            </div>

            <div class="form-group">
                <label for="name_as_per_store">Name as per Store</label>
                <input type="text" class="form-control" name="name_as_per_store" value="<?php echo remove_junk($e_item['name_as_per_store']); ?>">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                    <option value="IT" <?php if($e_item['type'] == 'IT') echo 'selected'; ?>>IT</option>
                    <option value="General" <?php if($e_item['type'] == 'General') echo 'selected'; ?>>General</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sub_type">Sub Type</label>
                <select class="form-control" name="sub_type">
                    <option value="Software" <?php if($e_item['sub_type'] == 'Software') echo 'selected'; ?>>Software</option>
                    <option value="Hardware" <?php if($e_item['sub_type'] == 'Hardware') echo 'selected'; ?>>Hardware</option>
                </select>
            </div>

            <div class="form-group">
                <label for="make">Make</label>
                <input type="text" class="form-control" name="make" value="<?php echo remove_junk($e_item['make']); ?>">
            </div>

            <div class="form-group">
                <label for="model_number">Model Number</label>
                <input type="text" class="form-control" name="model_number" value="<?php echo remove_junk($e_item['model_number']); ?>">
            </div>

            <div class="form-group">
                <label for="oem">Sr. no. OEM</label>
                <input type="text" class="form-control" name="oem" value="<?php echo remove_junk($e_item['oem']); ?>">
            </div>

            <div class="form-group">
                <label for="internet_connectivity">Internet Connectivity</label>
                <select class="form-control" name="internet_connectivity">
                    <option value="Yes" <?php if($e_item['internet_connectivity'] == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if($e_item['internet_connectivity'] == 'No') echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="wifi">Wi-Fi</label>
                <select class="form-control" name="wifi">
                    <option value="Yes" <?php if($e_item['wifi'] == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if($e_item['wifi'] == 'No') echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bluetooth">Bluetooth</label>
                <select class="form-control" name="bluetooth">
                    <option value="Yes" <?php if($e_item['bluetooth'] == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if($e_item['bluetooth'] == 'No') echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mac_address">MAC Address</label>
                <input type="text" class="form-control" name="mac_address" value="<?php echo remove_junk($e_item['mac_address']); ?>">
            </div>

            <div class="form-group">
                <label for="network_port">Network Port</label>
                <select class="form-control" name="network_port">
                    <option value="Yes" <?php if($e_item['network_port'] == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if($e_item['network_port'] == 'No') echo 'selected'; ?>>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="configuration">Configuration</label>
                <input type="text" class="form-control" name="configuration" value="<?php echo remove_junk($e_item['configuration']); ?>">
            </div>

            <div class="form-group">
                <label for="processor">Processor</label>
                <input type="text" class="form-control" name="processor" value="<?php echo remove_junk($e_item['processor']); ?>">
            </div>

            <div class="form-group">
                <label for="ram_type">RAM Type</label>
                <input type="text" class="form-control" name="ram_type" value="<?php echo remove_junk($e_item['ram_type']); ?>">
            </div>

            <div class="form-group">
                <label for="ram_size">RAM Size</label>
                <input type="text" class="form-control" name="ram_size" value="<?php echo remove_junk($e_item['ram_size']); ?>">
            </div>

            <div class="form-group">
                <label for="ssd_size">SSD Size</label>
                <input type="text" class="form-control" name="ssd_size" value="<?php echo remove_junk($e_item['ssd_size']); ?>">
            </div>

            <div class="form-group">
                <label for="hd_size">HD Size</label>
                <input type="text" class="form-control" name="hd_size" value="<?php echo remove_junk($e_item['hd_size']); ?>">
            </div>

            <div class="form-group">
                <label for="windows">Windows</label>
                <input type="text" class="form-control" name="windows" value="<?php echo remove_junk($e_item['windows']); ?>">
            </div>

            <div class="form-group">
                <label for="oem_warranty">OEM Warranty</label>
                <input type="text" class="form-control" name="oem_warranty" value="<?php echo remove_junk($e_item['oem_warranty']); ?>">
            </div>

            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" name="remarks" value="<?php echo remove_junk($e_item['remarks']); ?>">
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
