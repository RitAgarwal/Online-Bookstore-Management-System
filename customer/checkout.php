<?php
include_once 'header.php';
include_once '../config.php';
if (isset($_POST['check'])) {
  $user_id = $_SESSION['id'];
  $name = $_POST['fullname'];
  $address = $_POST['address'].', '.$_POST['city'].', '.$_POST['state'].', '.$_POST['pincode'];
  $mob = $_POST['mobile'];
  $sql = "INSERT INTO address(address_id,c_email,c_name,c_address,c_phone_no,checkout_id) VALUES(?,?,?,?,?,?)";
  if ($stmt = mysqli_prepare($link,$sql)) {
    mysqli_stmt_bind_param($stmt,'isssss',$param_id,$param_username,$param_name,$param_address,$param_mobile,$param_checkout);
    $param_id='';
    $param_username = $user_id;
    $param_name = $name;
    $param_address = $address;
    $param_mobile= $mob;
    $param_checkout = uniqid();
  //  $_SESSION['chkid'] = $param_checkout;
    if (mysqli_stmt_execute($stmt)) {
      echo "<script> window.location.href = 'cart.php';</script>";
    }else {
      echo "Error Occured";
    }
  }
}
?>
<div style="min-height:100vh;">
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h4 class="text-success"><strong>Add delivery address</Strong></h4>
        <form method="post" id="checkoutform" style="position: relative;">
          <div class="form-group">
            <i class="fa fa-user"></i><label>&nbsp;Full Name</label>
            <input type="text" name="fullname" class="form-control" placeholder="Enter full name" required>
            <div class="invalid-feedback">please enter name</div>
          </div>
          <div class="form-group">
            <i class="fas fa-address-card"></i><label>&nbsp;Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter address" required>
            <div class="invalid-feedback">please enter address</div>
          </div>
          <div class="form-group">
            <i class="fas fa-city"></i><label>&nbsp;City</label>
            <input type="text" name="city" class="form-control" placeholder="Enter city" required>
            <div class="invalid-feedback">please enter city</div>
          </div>
          <div class="form-group">
            <i class="fas fa-city"></i><label>&nbsp;State</label>
            <input type="text" name="state" class="form-control" placeholder="Enter state" required>
            <div class="invalid-feedback">please enter state</div>
          </div>
          <div class="form-group">
            <i class="fas fa-map-marked-alt"></i><label>&nbsp;Pin Code</label>
            <input type="text" name="pincode" class="form-control" placeholder="Enter pin code" required>
            <div class="invalid-feedback">please enter pin code</div>
          </div>
          <div class="form-group">
            <i class="fas fa-mobile-alt"></i><label>&nbsp;Mobile</label>
            <input type="text" name="mobile" class="form-control" placeholder="Enter mobile number" required pattern="^[6-9]\d{9}$">
            <div class="invalid-feedback">please enter mobile number</div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-success" id="check" name="check"
          title ="Currently cash on delivery is available">Add delivery address</button>
          </div>
        </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</div>

<?php include_once 'footer.php'; ?>
