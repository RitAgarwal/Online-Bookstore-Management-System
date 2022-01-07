<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>index page</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
<style>
.info
{
  text-align: center;
  color: white;

}
.nav-link
{
    font-size: 20px;
}
.sidebar tr td
{
  width:200px;
  height: 39px;
  text-align: center;
  border-collapse: collapse;
}
.sidebar tr:nth-child(even)
{
  background-color: dimgray;
}
.sidebar tr:nth-child(odd)
{
  background-color: dimgray;
}
.sidebar tr:nth-child(1)
{
  background-color: crimson;
  color: white;
}
.sidebar tr td a
{
  color:white;
  text-decoration: none;
}
.tag{
  width:100%;
  display:inline-table;
  height:30px;
  background-color: dimgray;
  text-align: center;
  font-weight: bold;
  color: white;
}
#product
{
  margin-top: 15px;
  margin-bottom: 15px;
  padding-left: 10px;
  position: relative;
  display:inline-block;
  left:10px;

  width:80%;
  height:80%;
  border-radius: 5px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  box-sizing:border-box;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}
#product::after{
  content: "";
  border-radius: 5px;
  position: absolute;
  z-index: -1;
  top:0;
  left:0;
  width: 100%;
  height: 100%;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  box-sizing: border-box;
  opacity: 0;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}
#product:hover{
  -webkit-transform: scale(1.05, 1.05);
  transform: scale(1.05, 1.05);
}
#product:hover::after{
  opacity: 1;
}
#center{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}

</style>
  </head>
  <body>
    <div >

    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"><img src="images/lg3.png" alt="" height="120" width="170"></a>
  <?php
  if (isset($_SESSION['loggedin'])) {
  echo '
  <div style="color:dimgray">
  <h5>Hello '.$_SESSION['name'].' ,</h5>
  </div>
  <br><br>';}
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
    <?php
    if (isset($_SESSION['loggedin'])) {
    echo '

    <a class="nav-link" href="cart.php"><b>Bag<i class="fas fa-shopping-cart"></i>&nbsp;<span class="badge badge-warning" style="border-radius:50%;height:20px;" id="countcart"></span></a></b>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="change_password.php"><i class="fas fa-key"></i> Change password</a>
          <a class="dropdown-item" href="orders_history.php"><i class="fas fa-cube"></i> Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

  }else {
    echo '<li class="nav-item">
      <a class="nav-link" href="login.php">login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.php">Signup</a>
    </li>';
  }


     ?>
    </ul>
  </div>
</nav>
<hr>
</div>
