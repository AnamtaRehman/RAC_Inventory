<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $itemcategories=find_all_categories();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th-large"></span>
          <span>Item Categories</span>
       </strong>
       <a href="add_categories.php" 
           class="btn btn-info pull-right"
        >
           Add New Category
        </a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>Id</th>
            <th>Category Name</th>
            <th class="text-center" style="width: 15%;">Type</th>
            <th class="text-center" style="width: 10%;">Sub Type</th>
            <th style="width: 20%;">Life (in yrs)</th>
            <th style="width: 20%;">Exp/non exp</th>
            <th class="text-center" style="width: 15%;">Edit </th>
        
          </tr>
        </thead>
        <tbody>
        <?php foreach($itemcategories as $a_user): ?>
          <tr>
           <td><?php echo remove_junk(ucwords($a_user['id']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['Item_name']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['Type']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['Sub_type']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['Life']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['exp']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_categories.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>


  <?php include_once('layouts/footer.php'); ?>
