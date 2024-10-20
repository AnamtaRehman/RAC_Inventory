<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_items=find_all_items();
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
          <span class="glyphicon glyphicon-plus"></span>
          <span>Item Details</span>
        </strong>
        <a href="add_add_items.php" 
           class="btn btn-info pull-right"
        >
           Add New Item
        </a>
      </div>
      <div class="panel-body">
        <div style="overflow-x:auto;">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th 
                class="text-center" 
                style="width: 50px; white-space: nowrap;"
              >
                Serial No.
              </th>
              <th style="white-space: nowrap;">
                Name
              </th>
              <th style="white-space: nowrap;" >
                Name as per Store
              </th>
              <th 
                class="text-center" 
                style="width: 15%; white-space: nowrap;"
              >
                Type
              </th>
              <th 
                class="text-center" 
                style="width: 10%;  white-space: nowrap;"
              >
                Sub Type
              </th>
              <th 
                style="width: 20%;  white-space: nowrap;"
              >
                Make
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Model Number
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Sr. No. OEM
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Internet Connectivity
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Wifi
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Bluetooth
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                MAC Address
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Network Port
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Configuration
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Processor
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                RAM Type
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                RAM Size
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                SSD Size
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                HD Size
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Windows
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                OEM Warranty
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Sr. No. by RAC
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Remarks
              </th>
              <th 
                style="width: 20%; white-space: nowrap;"
              >
                Edit
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_items as $a_user): ?>
              <tr>
                <td 
                  class="text-center"
                >
                  <?php echo count_id(); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['name'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['name_as_per_store'])); ?>
                </td>
                <td 
                  class="text-center" style = "white-space: nowrap;"
                >
                  <?php echo remove_junk(ucwords($a_user['type'])); ?>
                </td>
                <td 
                  class="text-center" style= "white-space: nowrap;"
                >
                  <?php echo remove_junk(ucwords($a_user['sub_type'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['make'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['model_number'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['oem'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['internet_connectivity'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['wifi'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['bluetooth'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['mac_address'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['network_port'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['configuration'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['processor'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['ram_type'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['ram_size'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['ssd_size'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['hd_size'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['windows'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['oem_warranty'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['id'])); ?>
                </td>
                <td style= "white-space: nowrap;">
                  <?php echo remove_junk(ucwords($a_user['remarks'])); ?>
                </td>
                <td class="text-center">
             <div class="btn-group">
                <a href="edit_items.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                </div>
           </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
            </div>
      </div>
    </div>
  </div>
</div>


  <?php include_once('layouts/footer.php'); ?>
