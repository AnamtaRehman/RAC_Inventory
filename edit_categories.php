<?php
  $page_title = 'Edit Item Record';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_item = find_by_id('itemcategories',(int)$_GET['id']);
  if(!$e_item){
    $session->msg("d","Missing Category ID.");
    redirect('edit_categories.php');
  }
?>
<?php
//Update Item record
if (isset($_POST['update'])) {
    $req_fields = array('id', 'Item_name', 'Type', 'Sub_type', 'Life', 'exp');
    validate_fields($req_fields);

    if (empty($errors)) {
        $id = remove_junk($db->escape($_POST['id']));
        $Item_name = remove_junk($db->escape($_POST['Item_name']));
        $Type = remove_junk($db->escape($_POST['Type']));
        $Sub_type = remove_junk($db->escape($_POST['Sub_type']));
        $Life = remove_junk($db->escape($_POST['Life']));
        $exp = remove_junk($db->escape($_POST['exp']));

        $sql = "UPDATE itemcategories SET 
                    Item_name = '{$Item_name}', 
                    Type = '{$Type}', 
                    Sub_type = '{$Sub_type}', 
                    Life = '{$Life}', 
                    exp = '{$exp}'
                WHERE id = '{$db->escape($id)}'";

        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->msg('s', "Category updated successfully!");
            redirect('itemcategories.php?id=' . (int)$e_item['id'], false);
        } else {
            $session->msg('d', 'Sorry, failed to the Category!');
            redirect('edit_categories.php?id=' . (int)$e_item['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_categories.php?id=' . (int)$e_item['id'], false);
    }
}
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12"><?php echo display_msg($msg); ?></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-pencil"></span>
                    Update Category for ID: <?php echo remove_junk(ucwords($e_item['id'])); ?>
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_categories.php?id=<?php echo (int)$e_item['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="id" class="control-label">Item ID</label>
                        <input type="text" class="form-control" name="id" value="<?php echo (int)$e_item['id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Item_name">Category Name</label>
                        <input type="text" class="form-control" name="Item_name" value="<?php echo remove_junk($e_item['Item_name']); ?>">
                    </div>
                    <div class="form-group">
                <label for="Type">Type</label>
                <select class="form-control" name="Type">
                    <option value="IT" <?php if($e_item['Type'] == 'IT') echo 'selected'; ?>>IT</option>
                    <option value="General" <?php if($e_item['Type'] == 'General') echo 'selected'; ?>>General</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Sub_type">Sub Type</label>
                <select class="form-control" name="Sub_type">
                    <option value="Software" <?php if($e_item['Sub_type'] == 'Software') echo 'selected'; ?>>Software</option>
                    <option value="Hardware" <?php if($e_item['Sub_type'] == 'Hardware') echo 'selected'; ?>>Hardware</option>
                </select>
            </div>
                    <div class="form-group">
                        <label for="Life">Life (in yrs)</label>
                        <input type="text" class="form-control" name="Life" value="<?php echo remove_junk($e_item['Life']); ?>">
                    </div>
                    <div class="form-group">
                <label for="exp">Exp/Non-Exp</label>
                <select class="form-control" name="exp">
                    <option value="exp" <?php if($e_item['exp'] == 'exp') echo 'selected'; ?>>exp</option>
                    <option value="non-exp" <?php if($e_item['exp'] == 'non-exp') echo 'selected'; ?>>non-exp</option>
                </select>
            </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
