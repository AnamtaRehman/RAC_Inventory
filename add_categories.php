<?php
  $page_title = 'Add Item';
  require_once('includes/load.php');
?>
<?php
  if(isset($_POST['add_categories'])){

   $req_fields = array( 'id', 'Item_name','Type','Sub_type','Life','exp');
   validate_fields($req_fields);

   if(empty($errors)){
       $id= remove_junk($db->escape($_POST['id']));
       $Item_name= remove_junk($db->escape($_POST['Item_name']));
       $Type= remove_junk($db->escape($_POST['Type']));
       $Sub_type= remove_junk($db->escape($_POST['Sub_type']));
       $Life= remove_junk($db->escape($_POST['Life']));
       $exp= remove_junk($db->escape($_POST['exp']));
       $check_query = "SELECT id FROM itemcategories WHERE id = '{$id}' LIMIT 1";
       $check_result = $db->query($check_query);
 
       if($db->num_rows($check_result) > 0){
         // ID already exists, handle it
         $session->msg('d','Sorry, this ID already exists. Please use a different ID');
         redirect('add_categories.php', false);
       }
       else{
        $query = "INSERT INTO itemcategories (";
        $query .="id, Item_name,Type,Sub_type, Life,exp";
        $query .=") VALUES (";
        $query .=" '{$id}', '{$Item_name}', '{$Type}','{$Sub_type}','{$Life}','{$exp}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"New Item has been added successfully! ");
          redirect('itemcategories.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry, failed to add the item!');
          redirect('add_categories.php', false);
        }
   } 
}else {
     $session->msg("d", $errors);
      redirect('add_categories.php',false);
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
          <span>Add Category</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_categories.php">
            
            
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" name ="id"  placeholder="id">
            </div>
            <div class="form-group">
                <label for="Item_name">Category Name</label>
                <input type="text" class="form-control" name="Item_name" placeholder="category name">
            </div>
            <div class="form-group">
    <label for="Type">Type</label>
    <select class="form-control" name="Type" id="Type">
        <option value="IT">IT</option>
        <option value="General">General</option>
    </select>
    </div>
            <div class="form-group">
            <label for="Sub_type">Sub Type</label>
            <select class="form-control" name="Sub_type" id="Sub_type">
        <option value="Software">Software</option>
        <option value="Hardware">Hardware</option>
    </select>
            </div>
        
        <div class="form-group">
                <label for="Life">Life (in yrs)</label>
                <input type="text" class="form-control" name="Life" placeholder="Life">
            </div>
            <div class="form-group">
                <label for="exp">Exp/Non-Exp</label>
                <select class="form-control" name="exp" id="exp">
        <option value="exp">exp</option>
        <option value="non-exp">non-exp</option>
    </select>
    </div>
                <div class="form-group clearfix">
              <button type="submit" name="add_categories" class="btn btn-primary">Add Item</button>
            </div>
            
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>