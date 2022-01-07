<?php
include_once 'header.php';
include_once '../config.php';
$user_id = $_SESSION['id'];
$user_address = "";
$status=$output='';
if (isset($_POST['remove'])) {
  $book_id = $_POST['book_id'];
  $sql = "DELETE FROM cart WHERE c_email = '$user_id' AND book_id = $book_id";
  $result = mysqli_query($link,$sql);
}
if (isset($_POST['update'])) {
  $book_id = $_POST['book_id'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = (float)$quantity*(float)$price;
  $sql = "UPDATE cart SET quantity = '$quantity',total_price = '$total' WHERE c_email='$user_id' AND book_id=$book_id";
  $result = mysqli_query($link,$sql);
}
 ?>
 <div style="min-height:100vh;">
 <div class="container">
   <div class="row">
     <div class="col-sm-2"></div>
     <div class="col-sm-8">
       <span><?php echo $status; ?></span>
       <?php
       $sql = "SELECT * FROM cart WHERE c_email = '$user_id'";
       $result = mysqli_query($link,$sql);
       if (mysqli_num_rows($result)<1) {
         echo "<img src ='images/empty1.png'>";
       }else {
         ?>
         <h4 class="text-success">My Shopping Cart</h4>
         <table class="table">
           <tr>
             <td>Product</td>
             <td>Price</td>
             <td>Quantity</td>
             <td>Total</td>
           </tr>
           <?php

           while ($row = mysqli_fetch_array($result)) {
             ?>
             <tr>
               <td><?php echo '<img src="'.$row['img'].'" height="100" width="100"><br>';
               echo  $row['book_name'];?>
               <br>
               <form method="post">
                 <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                 <button type="submit" name="remove" class="btn btn-sm btn-danger">Remove</button>
               </form>
               </td>
             <td><?php echo "&#8377; " .$row['price']; ?></td>
             <td>
               <form method="post">
                 <div class="form-group">
                   <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                   <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                  <span class="badge badge-info"><?php echo $row['quantity']; ?></span>
                   <select name="quantity">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                   </select>
                   <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                 </div>
                </form>
             </td>
             <td><?php echo "&#8377; " .(float)$row['price']*(float)$row['quantity']; ?></td>
             </tr>
          <?php
           }
            ?>
         </table>
         <div class="total">
           <?php
              $total_price=0;
              $sql = "SELECT * FROM cart WHERE c_email='$user_id'";
              $result = mysqli_query($link,$sql) or die(mysqli_error($link));
              while ($row = mysqli_fetch_array($result)) {
                $total_price = $total_price + (int)$row['total_price'];
              }
            ?>
            <span class="text-primary float-right"><h5><?php echo "Total Price: &#8377; ".$total_price; ?><h5></span>
        <!--   <a href="checkout.php">--><button type="button" class="btn btn-success float-right checkout"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
         </div>
         <?php
       }
        ?>

     </div>
     <div class="col-sm-2"></div>
   </div>
 </div>
</div>
<!-- Login Modal -->
<div class="modal" id="deliveryAddressModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Select Delivery Address</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <span id="a1"></span>

      <!-- Modal body -->
      <div class="modal-body">
        <?php
        if (isset($_POST['selectaddress'])) {
          $_SESSION['address'] = $_POST['address_id'];
          echo "<script>
              window.location.href = 'order_review.php';
          </script>";
        }
        $sql = "SELECT * FROM address where c_email = '$user_id'";
        $result = mysqli_query($link,$sql);
        if (mysqli_num_rows($result)>0)
        {
            while ($row = mysqli_fetch_array($result)) {

            $output .= '<div class="alert-secondary p-2 rounded-top">
                        <form method="post">
                        <h5>Address:- '.$row['c_address'].'</h5>
                        <input type="hidden" name="address_id" value="'.$row['c_address'].'">
                        <button type ="submit" class="btn btn-sm btn-outline-primary" name="selectaddress">Select</button></tr><hr>
                        </form>
                        </div>
                        ';

          }

        }else {
          $output = '<div class="alert alert-danger">No record found</div>';
        }
        echo $output;
         ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="checkout.php"><button type="submit" class="btn btn-success float-right">Add new delivery address</button></a>
      </div>
  </div>
</div>
</div>

<?php include_once 'footer.php'; ?>
