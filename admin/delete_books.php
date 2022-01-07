<?php
require_once '../config.php';
require_once 'header.php';
require_once 'logincheck.php';
$output="";
if (isset($_POST['q'])) {
  $book_name = test_input($_POST['book_name']);
  $sql= "SELECT * FROM book WHERE book_name = '$book_name'";

  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $sql1="DELETE FROM book WHERE book_name='$book_name'";
    if (mysqli_query($link,$sql1)) {
      $output = '<div class="alert alert-success">Book deleted successfully</div>';
    }
  }else {
    $output = '<div class="alert alert-danger">No record found</div>';
  }
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
     <div class="col-lg-2">
     </div>
     <div class="col-lg-12">
       <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" name="book_name" type="text" placeholder="Enter book name" aria-label="Search">
    <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Delete"> &nbsp;&nbsp;

  </form>
  <br>
  <br>
  <?php echo $output; ?>
     </div>
   </div>
 </div>
</div>
 <?php
 require_once 'footer.php';
  ?>
