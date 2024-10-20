<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 
 $all_RACusers=find_all_RACusers();
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-user"></span>
          <span>RAC Users</span>
       </strong>
         <a href="add_racuser.php" class="btn btn-info pull-right">Add New User</a>
      </div>
     <div class="panel-body">
     <div style="overflow-x:auto;">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px; white-space: nowrap;">Serial No.</th>
            <th>Id</th>
            <th>Name</th>
            <th class="text-center" style="width: 15%;">Designation</th>
            <th class="text-center" style="width: 10%; white-space: nowrap;">Mobile No.</th>
            <th style="width: 20%; white-space: nowrap;">Email ID</th>
            <th style="width: 20%;">DOB</th>
            <th style="width: 20%;">PIS</th>
            <th style="width: 20%;">Head</th>
            <th style="width: 20%; white-space: nowrap;">Emp Type</th>
            <th style="width: 20%;">Status</th>
            <th class="text-center" style="width: 100px;">Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_RACusers as $a_user): ?>
          <tr>
           <td class="text-center" style="width: 15%; white-space: nowrap;"><?php echo count_id();?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Id']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Name']))?></td>
           <td style="width: 15%; white-space: nowrap;" class="text-center"><?php echo remove_junk(ucwords($a_user['Designation']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Mobile_no']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Email_id']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Dob']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['PIS']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Head']))?></td>
           <td style="width: 15%; white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['Emp_type']))?></td>
           
           <td class="text-center">
           <?php if($a_user['Status'] === 'Active'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactive"; ?></span>
          <?php endif;?>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_racuser.php?id=<?php echo (int)$a_user['Id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
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
</div>

  <?php include_once('layouts/footer.php'); ?>
