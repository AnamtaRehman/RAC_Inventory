<?php
  $page_title = 'Usage Records';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 
 $usage_records=usage_records();
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-duplicate"></span>
          <span>Usage Records</span>
       </strong>
         <a href="add_usage_record.php" class="btn btn-info pull-right">Add a Record</a>
      </div>
     <div class="panel-body">
     <div style="overflow-x:auto;">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <th style="width: 10%; white-space: nowrap;">Serial No.</th>
          <th style="width: 10%; white-space: nowrap;">OEM Sr. No.</th>
            <th style="width: 15%; white-space: nowrap;">RAC Sr. No.</th>
            <th style="width: 15%; white-space: nowrap;">Name as per Store</th>
            <th style="width: 15%; white-space: nowrap;">User ID</th>
            <th style="width: 10%; white-space: nowrap;">User Name</th>
            <th style="width: 20%; white-space: nowrap;">User Email</th>
            <th style="width: 20%; white-space: nowrap;">Room No.</th>
            <th style="width: 20%; white-space: nowrap;">Div Head Name</th>
            <th style="width: 20%; white-space: nowrap;">Inventory Holder Name</th>
            <th style="width: 20%; white-space: nowrap;">Reason for Item Transfer</th>
            <th style="width: 20%; white-space: nowrap;">Upload Authority Letter</th>
            <th style="width: 20%; white-space: nowrap;">From Date</th>
            <th style="width: 10%; white-space: nowrap;">To Date</th>
            <th style="width: 20%; white-space: nowrap;">Presently Using?</th>
            <th style="width: 20%; white-space: nowrap;">Remarks</th>
            <th style="width: 20%;white-space: nowrap;">Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($usage_records as $a_usage): ?>
            <tr>
           <td class="text-center" style= "white-space: nowrap;"><?php echo count_id();?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['oem_sr_no']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['id']))?></td>
           <td class="text-center" style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['name_as_per_store']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['user_id']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['user_name']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['user_email']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['room_no']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['div_head_name']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['inventory_holder_name']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['reason_for_item_transfer']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['upload_authority_letter']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['from_date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['to_date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['presently_using']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_usage['remarks']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_usage_record.php?id=<?php echo (int)$a_usage['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
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