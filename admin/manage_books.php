<?php
require_once 'header.php';
require_once 'logincheck.php';
 ?>

 <div class="container">
   <div class="row">
     <div class="col-lg-2">
     </div>
     <div class="col-lg-12">
       <div class="alert alert success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%); color:white; text-align:center;">
         <h5>Welcome To Admin Panel</h5>
       </div>
       <div class="card-deck">
       <div class="card" style="width: 16rem;">
   <img class="card-img-top" src="images/bookadd.png" alt="Card image cap" height="220">
   <div class="card-body">
     <h4 class="card-title text-primary" style="text-align:center;">Add Books</h4>

     <a href="add_books.php" class="btn btn-success" style="width:100%;background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">Add</a>
   </div>
 </div>
 <div class="card" style="width: 16rem;">
 <img class="card-img-top" src="images/view.png" alt="Card image cap" height="220">
 <div class="card-body">
 <h4 class="card-title text-primary" style="text-align:center;">View Books</h4>

 <a href="view_books.php" class="btn btn-success" style="width:100%;background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">View</a>
 </div>
 </div>

 <div class="card" style="width: 16rem;">
 <img class="card-img-top" src="images/bookdelete.png" alt="Card image cap" height="220">
 <div class="card-body">
 <h4 class="card-title text-primary" style="text-align:center;">Remove Books</h4>

 <a href="delete_books.php" class="btn btn-success" style="width:100%;background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">Remove</a>
 </div>
 </div>
 </div>
     </div>
   </div>
 </div>
 <?php
 require_once 'footer.php';
  ?>
