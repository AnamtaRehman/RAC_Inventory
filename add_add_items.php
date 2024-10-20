<?php
  $page_title = 'Add Item';
  require_once('includes/load.php');
?>
<?php
  if(isset($_POST['add_item'])){

   $req_fields = array( 'name', 'name_as_per_store','type','sub_type','make','model_number','oem','internet_connectivity','wifi','bluetooth','mac_address','network_port','configuration','processor','ram_type','ram_size','ssd_size','hd_size','windows','oem_warranty','id','remarks');
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
       $check_query = "SELECT id FROM add_items WHERE id = '{$id}' LIMIT 1";
       $check_result = $db->query($check_query);
 
       if($db->num_rows($check_result) > 0){
         // ID already exists, handle it
         $session->msg('d','Sorry, this Sr. No. already exists. Please use a different Sr. No. by RAC.');
         redirect('add_add_items.php', false);
       }
       else{
        $query = "INSERT INTO add_items (";
        $query .="name, name_as_per_store,type,sub_type,make,model_number,oem,internet_connectivity,wifi,bluetooth,mac_address,network_port,configuration,processor,ram_type,ram_size,ssd_size,hd_size,windows,oem_warranty,id,remarks";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$name_as_per_store}', '{$type}','{$sub_type}','{$make}','{$model_number}','{$oem}','{$internet_connectivity}','{$wifi}','{$bluetooth}', '{$mac_address}', '{$network_port}','{$configuration}','{$processor}','{$ram_type}','{$ram_size}','{$ssd_size}','{$hd_size}','{$windows}','{$oem_warranty}','{$id}','{$remarks}' ";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"New Item has been added successfully! ");
          redirect('add_add_items.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry, failed to add the item!');
          redirect('add_add_items.php', false);
        }
   } 
}else {
     $session->msg("d", $errors);
      redirect('add_add_items.php',false);
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
          <span>Add Details</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_add_items.php">
            
            
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name ="name"  placeholder="name">
            </div>
            <div class="form-group">
                <label for="name_as_per_store">name_as_per_store</label>
                <input type="text" class="form-control" name="name_as_per_store" placeholder="name_as_per_store">
            </div>
            <div class="form-group">
            <label for="type">type</label>
            <select class="form-control" name="type" id="type">
                <option value="IT">IT</option>
                <option value="General">General</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sub_type">sub_type</label>
            <select class="form-control" name="sub_type" id="sub_type">
                <option value="Software">Software</option>
                <option value="Hardware">Hardware</option>
            </select>
        </div>
            <div class="form-group">
                <label for="make">make</label>
                <input type="text" class="form-control" name="make" placeholder="make">
            </div>
            <div class="form-group">
                <label for="model_number">model_number</label>
                <input type="text" class="form-control" name="model_number" placeholder="model_number">
            </div>
            <div class="form-group">
                <label for="oem">Sr. no. OEM</label>
                <input type="text" class="form-control" name="oem" placeholder="oem">
            </div>
            <div class="form-group">
            <label for="internet_connectivity">internet_connectivity</label>
            <select class="form-control" name="internet_connectivity" id="internet_connectivity">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="wifi">wifi</label>
            <select class="form-control" name="wifi" id="wifi">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bluetooth">bluetooth</label>
            <select class="form-control" name="bluetooth" id="bluetooth">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
            
            <div class="form-group">
                <label for="mac_address">MAC Address</label>
                <input type="text" class="form-control" name="mac_address" placeholder="mac_address">
            </div>
            <div class="form-group">
            <label for="network_port">network_port</label>
            <select class="form-control" name="network_port" id="network_port">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="form-group">
                <label for="configuration">configuration</label>
                <input type="text" class="form-control" name="configuration" placeholder="configuration">
            </div>
            <div class="form-group">
                <label for="processor">processor</label>
                <input type="text" class="form-control" name="processor" placeholder="processor">
            </div>
            <div class="form-group">
                <label for="ram_type">RAM Type</label>
                <input type="text" class="form-control" name="ram_type" placeholder="ram_type">
            </div>
            <div class="form-group">
                <label for="ram_size">RAM Size</label>
                <input type="text" class="form-control" name="ram_size" placeholder="ram_size">
            </div>
            <div class="form-group">
                <label for="ssd_size">SSD Size</label>
                <input type="text" class="form-control" name="ssd_size" placeholder="ssd_size">
            </div>
            <div class="form-group">
                <label for="hd_size">HD Size</label>
                <input type="text" class="form-control" name="hd_size" placeholder="hd_size">
            </div>
            <div class="form-group">
                <label for="windows">Windows</label>
                <input type="text" class="form-control" name="windows" placeholder="windows">
            </div>
            <div class="form-group">
                <label for="oem_warranty">OEM Warranty</label>
                <input type="text" class="form-control" name="oem_warranty" placeholder="oem_warranty">
            </div>
            <div class="form-group">
                <label for="id">Sr. no. by RAC</label>
                <input type="text" class="form-control" name="id" placeholder="id">
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" name="remarks" placeholder="remarks">
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
