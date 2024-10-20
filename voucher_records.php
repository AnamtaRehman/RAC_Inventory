<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 
 $voucher_records=voucher_records();
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-picture"></span>
          <span>Voucher Records</span>
       </strong>
         <a href="add_voucher_record.php" class="btn btn-info pull-right">Add Voucher Record</a>
      </div>
     <div class="panel-body">
     <div style="overflow-x:auto;">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10%; white-space: nowrap;">Serial no.</th>
            <th style="width: 15%; white-space: nowrap;">Date</th>
            <th style="width: 15%; white-space: nowrap;">Voucher No.</th>
            <th style="width: 15%; white-space: nowrap;">Mode</th>
            <th style="width: 10%; white-space: nowrap;">RAC in Date</th>
            <th style="width: 20%; white-space: nowrap;">Warranty Time (in years)</th>
            <th style="width: 20%; white-space: nowrap;">Warranty Valid upto Date</th>
            <th style="width: 20%; white-space: nowrap;">Sender Name</th>
            <th style="width: 20%; white-space: nowrap;">Sender Address</th>
            <th style="width: 20%; white-space: nowrap;">GST No.</th>
            <th style="width: 20%; white-space: nowrap;">State</th>
            <th style="width: 20%; white-space: nowrap;">Total Amount (before tax)</th>
            <th style="width: 10%; white-space: nowrap;">GST Amount (in Rs.)</th>
            <th style="width: 20%; white-space: nowrap;">Total Amount (in Rs.)</th>
            <th style="width: 20%; white-space: nowrap;"> Item Temp Loan </th>
            <th style="width: 20%;white-space: nowrap;">Loan upto Date</th>
            <th style="width: 20%;white-space: nowrap;">Item Description</th>
            <th style="width: 20%;white-space: nowrap;">Upload Voucher</th>
            <th style="width: 20%;white-space: nowrap;">Remarks</th>
            <th style="width: 20%;white-space: nowrap;">Edit</th>
          </tr>
        </thead>
        <tbody>
     
    
        <?php foreach($voucher_records as $a_user): 
        
          $imageBlob = $a_user['upload_voucher'];
    if ($imageBlob) {
        // Convert BLOB to Base64
        $imageBase64 = base64_encode($imageBlob);
        $imageSrc = 'data:image/jpg;base64,' . $imageBase64; // Adjust the MIME type if needed
    } else {
        $imageSrc = ''; // Handle case where no image is present
    }?>
          <tr>
           <td class="text-center" style= "white-space: nowrap;"><?php echo count_id();?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['id']))?></td>
           <td class="text-center" style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['mode']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['rac_in_date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['warranty_time_in_year']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['warranty_valid_upto_date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['sender_name']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['sender_address']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['gst_number']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['state']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['total_amount_before_tax']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['gst_amount']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['total']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['item_temp_loan']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['loan_upto_date']))?></td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['item_description']))?></td>
           <td style="white-space: nowrap;">
    <?php if (!empty($imageSrc)): ?>
        <img src="<?php echo $imageSrc; ?>" alt="Voucher Image" style="max-width: 100px; height: auto;">
    <?php else: ?>
        No image available
    <?php endif; ?>
</td>
           <td style= "white-space: nowrap;"><?php echo remove_junk(ucwords($a_user['remarks']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_voucher_records.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
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
