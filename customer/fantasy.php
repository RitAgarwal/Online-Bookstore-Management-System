<?php
require_once 'header.php';
require_once '../config.php';
$output=''; ?>
 <div class="container">
   <div class="row">
     <div class="col-sm-3">
       <table class="sidebar">
         <tr><td>CATEGORIES</td></tr>
         <tr><td><a href="bestseller.php">Best Sellers</a></td></tr>
         <tr><td><a href="Action&Adventure.php">Action & Adventure</a></td></tr>
         <tr><td><a href="business_management.php">Business & Management</a></td></tr>
         <tr><td><a href="fantasy.php">Fantasy</a></td></tr>
         <tr><td><a href="science_fiction.php">Science Fiction</a></td></tr>
         <tr><td><a href="horror.php">Horror</a></td></tr>

       </table>
     </div>
     <div class="col-sm-9">
     <span id="status"></span>
        <div class="tag">Fantasy</div>
            <div class="row">
              <?php
                $output='';
                 $sql = "SELECT *FROM book WHERE category ='Fantasy' ORDER BY book_id";
                 $result = mysqli_query($link,$sql);
                 while ($row = mysqli_fetch_array($result)) {
                   $output .='<div class="col-sm-4" id="product">
                         <img src="'.$row['img'].'" width="80%" height="200"id="center">
                         <h5 style="font-size: medium"id="center"> '.$row['book_name'].'</h5>
                         <h6 style="font-size: small"id="center">By '.$row['author'].'</h6>
                         <h6 style="font-size: larger;color:red;font-family:Verdana"id="center">&#x20b9 '.$row['price'].'</h6>
                         <form name="form" method="post">
                         <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
                         <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
                         <input type="hidden" name="img" id="img'.$row['book_id'].'" value="'.$row['img'].'">
                         <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';
                         if (!isset($_SESSION['loggedin'])) {
                           $output.= '<input type="submit" name="submit" value="Add To Cart"  class="btn btn-primary login" style="width:80%; background-color:crimson;font-family:Arial;padding-left:15px;margin-left:23px;" >';
                         }else {
                           $output .= '<button type="button" id="'.$row['book_id'].'" class="btn btn-primary" style="width:80%;background-color:crimson;font-family:Arial;padding-left:12px;margin-left:23px;">Add To Cart</button>';
                         }
                         $output .='</form></div>';


                 }

                 echo $output;


               ?>
             </div>

          </div>
       </div>
     </div>
   </div>
</div>
<?php require_once 'footer.php'; ?>
