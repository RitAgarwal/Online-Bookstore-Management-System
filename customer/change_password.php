<?php
include_once 'header.php';
include_once '../config.php';
$user_id = $_SESSION['id'];
$old_password_error = $new_password_error = $cnfpass_error = $status ='';
$oldpassword = $newpassword = $cnfnewpassword = '';
if (isset($_POST['submit'])) {
  if (empty($_POST['oldpassword'])) {
    $old_password_error = "<p class='text-danger'>please enter old password</p>";
  }else {
    $oldpassword = test_input($_POST['oldpassword']);
  }
  if (empty($_POST['newpassword'])) {
    $new_password_error = "<p class='text-danger'>please enter new password</p>";
  }else {
    $newpassword = test_input($_POST['newpassword']);
  }
  if (empty($_POST['cnfnewpassword'])) {
    $cnfpass_error = "<p class='text-danger'>please confirm new password</p>";
  }else {
    $cnfnewpassword = test_input($_POST['cnfnewpassword']);
  }
  if (empty($old_password_error) && empty($new_password_error) && empty($cnfpass_error)) {
    $sql = "SELECT c_email,c_name,c_password FROM registration WHERE c_email='$user_id'";
    $res = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($res))
    {
      $pass = $row['c_password'];
    }
    if (!password_verify($oldpassword,$pass)) {
      $status = "<p class='text-danger'>You entered wrong old password</p>";
    }else {
      if ($newpassword !== $cnfnewpassword) {
        $status = "<p class='text-danger'>You entered wrong old password</p>";
      }else {
        $password = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE registration SET c_password = '$password' WHERE c_email = '$user_id'";
        $res = mysqli_query($link,$sql);
        if ($res) {
          $status = "<p class='text-success'>Password changed successfully</p>";
        }else {
          $status = "<p class='text-danger'>Error occured</p>";
        }
      }
    }
  }
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
 ?>
 <div class="container">
   <div class="row">
     <div class="col-sm-4"></div>
     <div class="col-sm-4">
       <span><?php echo $status; ?></span>
       <span><strong><h4>Change Password</h4></strong></span>
       <br>
       <form method="post">
         <div class="form-group">
           <i class="fa fa-key"></i><label>&nbsp; Old password</label>
           <input type="password" name="oldpassword" class="form-control" placeholder="Enter old password">
           <span><?php echo $old_password_error; ?></span>
         </div>
         <div class="form-group">
           <i class="fa fa-key"></i><label>&nbsp; New password</label>
           <input type="password" name="newpassword" class="form-control" placeholder="Enter new password">
           <span><?php echo $new_password_error; ?></span>
         </div>
         <div class="form-group">
           <i class="fa fa-key"></i><label>&nbsp; Confirm new password</label>
           <input type="password" name="cnfnewpassword" class="form-control" placeholder="Enter new password">
           <span><?php echo $cnfpass_error; ?></span>
         </div>
         <div class="form-group">
           <input type="submit" name="submit" value="Change password" class="btn btn-success">
         </div>
       </form>
     </div>
     <div class="col-sm-4"></div>
   </div>
 </div>
 <?php include_once 'footer.php'; ?>
