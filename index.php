<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="justify-content: center; padding:10px; border:0px solid #ddd; display: flex; flex-direction: column; align-items: center;">
    <div class="text-center">
    <img src="raclogo.png" alt="RAC" style="max-width: 100px; margin-bottom: 20px;">
       <h1>Login Panel</h1>
       <h4>RAC Inventory Portal</h4>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group" style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-danger" style="border-radius:0%">Login</button>
</div>
    </form>
</div>


<?php include_once('layouts/footer.php'); ?>
