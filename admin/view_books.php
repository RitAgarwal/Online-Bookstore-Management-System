<?php
require_once '../config.php';
require_once 'header.php';
require_once 'logincheck.php';
$output ="";
if (isset($_POST['updatebook'])) {
  $_SESSION['bookid'] = $_POST['update_book'];
  echo "<script>
      window.location.href = 'update_books.php';
  </script>";
}
if (isset($_POST['q'])) {
  $book_name = test_input($_POST['book_name']);
  $sql= "SELECT * FROM book WHERE book_name LIKE '%$book_name%'";

  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $output .= '<table class="table">
      <tr>
        <th>Book_id</th>
        <th>Bookname</th>
        <th>Author</th>
        <th>Price</th>
        <th>Image</th>
      </tr>';
    while ($row = mysqli_fetch_array($result)) {

      $output .= '
        <tr>
          <td>'.$row['book_id'].'</td>
          <td>'.$row['book_name'].'</td>
          <td>'.$row['author'].'</td>
          <td>'.$row['price'].'</td>
          <td><img src="'.$row["img"].'" height="100" width="100">&nbsp;&nbsp;&nbsp;
          <form method="post">
          <input type="hidden" name="update_book" value="'.$row['book_id'].'">
          <button type ="submit" class="btn btn-sm btn-outline-primary" name="updatebook">Update</button>
          </form>
          </td>
        </tr>';

    }
    $output .='</table>';

  }else {
    $output = '<div class="alert alert-danger">No record found</div>';
  }
}

if (isset($_POST['all'])) {
  $sql="SELECT * FROM book";
  $result = mysqli_query($link,$sql);
  if (mysqli_num_rows($result)>0)
  {
    $output .= '<table class="table">
      <tr>
      <th>Book_id</th>
      <th>Bookname</th>
      <th>Author</th>
      <th>Price</th>
      <th>Image</th>
      <th></th>
      </tr>';
    while ($row = mysqli_fetch_array($result)) {

      $output .= '
        <tr>
        <td>'.$row['book_id'].'</td>
        <td>'.$row['book_name'].'</td>
        <td>'.$row['author'].'</td>
        <td>'.$row['price'].'</td>
        <td><img src="'.$row["img"].'" height="100" width="100">&nbsp;&nbsp;&nbsp;</td>
        <td>
        <form method="post">
        <input type="hidden" name="update_book" value="'.$row['book_id'].'">
        <button type ="submit" class="btn btn-sm btn-outline-primary" name="updatebook">Update</button>
        </form>
        </td>
        </tr>';
    }
    $output .='</table>';

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
    <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Search"> &nbsp;&nbsp;
    <button class="btn btn-outline-success my-2 my-sm-0" name="all" type="submit">View All</button>
  </form>
  <br><br>
      <?php echo $output; ?>
     </div>
   </div>
 </div>
</div>
 <?php
 require_once 'footer.php';
  ?>
