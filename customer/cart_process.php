<?php
session_start();
include_once '../config.php';
$status = "";
$var = $_POST['action'];
switch ($var) {
  case 'add_to_cart':
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $book_name = str_replace("'","''",$book_name);
    $image = $_POST['image'];
    $price = $_POST['price'];
    $user_id = $_SESSION['id'];
    $quantity = $_POST['quantity'];
    $sql = "SELECT * FROM cart WHERE c_email= '$user_id' AND book_id = $book_id";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==1)
    {
      $status = '<div class="alert alert-danger" role="alert">Item is already added to cart</div>';
    }else {
      $sql = "INSERT INTO cart(cart_id,book_id,book_name,img,price,total_price,quantity,c_email) VALUES('',$book_id,
      '$book_name','$image','$price','$price','$quantity','$user_id')";
      if(mysqli_query($link,$sql))
      {
        $status = '<div class="alert alert-success" role="alert">Item added to cart</div>';
      }else {
        $status = '<div class="alert alert-danger" role="alert">Cannot add item to cart</div>';
      }
    }
    echo $status;
    break;

}

 ?>
