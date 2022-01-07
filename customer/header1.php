<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>signup page</title>
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
</style>
  </head>
  <body>
    <div >

    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="profile.php"><img src="images/lg3.png" alt="" height="120" width="170"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
    <?php

    echo '<li class="nav-item">
      <a class="nav-link" href="login.php">login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.php">Signup</a>
    </li>';

     ?>
    </ul>
  </div>
</nav>
<hr>
</div>
