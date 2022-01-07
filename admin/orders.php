<?php
include_once 'header.php';
include_once '../config.php';
include_once 'logincheck.php';
$output = $out = $out1 ='';
//$user_id = $_SESSION['id'];
$order_id =$username= '';
$result=$total_orders='';
//$pay_id = $_SESSION['pay_id'];
//$order_id = $_SESSION['order_id'];







if(isset($_POST['view']))
{
  $_SESSION['orderid'] = $_POST['order_id'];
  echo "<script>
      window.location.href = 'order_details.php';
  </script>";
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
 <div style="min-height:100vh;">
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <form class="form-inline" method="post">
           <input class="form-control mr-sm-2" name="username" type="text" placeholder="Enter username" aria-label="Search">
           <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Search"> &nbsp;&nbsp;
           <button class="btn btn-outline-success my-2 my-sm-0" name="all" type="submit">View All</button>
        </form>
        <br>
      <!--   <span class="text-success p-3"><strong>ORDER HISTORY</strong> -->
           </span>
           <br>
           <div class="detaile p-3">
             <?php
             if (isset($_POST['q'])) {
               $username = test_input($_POST['username']);
               $sql = "SELECT DISTINCT order_id FROM orders WHERE c_email = '$username' ORDER BY sno DESC" ;
               $result = mysqli_query($link,$sql);
               $total_orders = mysqli_num_rows($result);
               while($row = mysqli_fetch_array($result)){
                       $order_id = $row['order_id'];
                       $out1 = '';
                       $ql = "SELECT * FROM orders WHERE c_email = '$username' AND order_id = '$order_id'";
                       $res = mysqli_query($link,$ql);
                       while($row = mysqli_fetch_array($res))   {
                         $address = $row['c_address'];
                         $mobile = $row['c_phone_no'];
                         $dob = $row['date_of_purchase'];
                         $status = $row['status'];
                        $out1 .= '<tr>
                        <td>'.$row['book_name'].'</td>
                        <td> &#8377; '.$row['price'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td> &#8377; '.$row['total_price'].'</td>
                        </tr>';
                         }
                       $out = '<div class="alert-secondary rounded-top p-2">
                             <form method="post">
                             <strong>Username : '.$username.'</strong><br>
                             <strong>Delivery Address : '.$address.'</strong><br>
                             <strong>Mobile : '.$mobile.'</strong><br>
                             <strong>Date Of Purchase  : '.$dob.'</strong><br>
                             <strong>Status : '.$status.'</strong><br>
                             <strong>Order Id : '.$order_id.'</strong></form>
                             </div>
                             <table class="table table-dark">
                             <tr><th class="w-25">BOOK NAME</th>
                             <th>PRICE</th>
                             <th>QUANTITY</th>
                             <th>TOTAL</th></tr>
                             '.$out1.'
                             </table><br>';

                echo $out;
              }
             }
             if (isset($_POST['all'])) {
               $sql = "SELECT DISTINCT order_id,c_email FROM orders ORDER BY sno DESC" ;
               $result = mysqli_query($link,$sql);
               $total_orders = mysqli_num_rows($result);
               while($row = mysqli_fetch_array($result)){
                       $order_id = $row['order_id'];
                       $username = $row['c_email'];
                       $out1 = '';
                       $ql = "SELECT * FROM orders WHERE  order_id = '$order_id'";
                       $res = mysqli_query($link,$ql);
                       while($row = mysqli_fetch_array($res))   {
                         $address = $row['c_address'];
                         $mobile = $row['c_phone_no'];
                         $dob = $row['date_of_purchase'];
                         $status = $row['status'];
                        $out1 .= '<tr>
                        <td>'.$row['book_name'].'</td>
                        <td> &#8377; '.$row['price'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td> &#8377; '.$row['total_price'].'</td>
                        </tr>';
                         }
                       $out = '<div class="alert-secondary rounded-top p-2">
                             <form method="post">
                             <strong>Username : '.$username.'</strong><br>
                             <strong>Delivery Address : '.$address.'</strong><br>
                             <strong>Mobile : '.$mobile.'</strong><br>
                             <strong>Date Of Purchase  : '.$dob.'</strong><br>
                             <strong>Status : '.$status.'</strong><br>
                             <strong>Order Id : '.$order_id.'</strong>
                             </form>
                             </div>
                             <table class="table table-dark">
                             <tr><th class="w-25">BOOK NAME</th>
                             <th>PRICE</th>
                             <th>QUANTITY</th>
                             <th>TOTAL</th></tr>
                             '.$out1.'
                             </table>';

                echo $out;
              }
             }


             ?>
           </div>
       </div>
     </div>
  </div>
 </div>
 <?php include_once 'footer.php'; ?>
