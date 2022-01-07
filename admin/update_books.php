<?php
require_once '../config.php';
require_once 'header.php';
require_once 'logincheck.php';
$bookid = $_SESSION['bookid'];
$bookname_error=$author_error=$price_error=$category_error=$image_error="";
$bookname = $author = $price = $category = $image= $status = "";
if (isset($_POST['bookname'])) {
  if (empty($_POST['book_name'])) {
    $bookname_error = "please enter book name";
  }else {
    $bookname= test_input($_POST['book_name']);
    $name_pattern='/^[a-zA-Z ]+$/';
    if (!preg_match($name_pattern,$bookname)) {
      $bookname_error ="please enter valid book name";
    }
  }
  if (empty($bookname_error)){
    $sql = "UPDATE book SET book_name = '$bookname' WHERE book_id=$bookid";
    if (mysqli_query($link,$sql)) {
      $status = '<div class="alert alert-success">Book updated successfully</div>';
    }else {
      $status = '<div class="alert alert-danger">Error occured</div>';
    }
  }
}
if (isset($_POST['author_name'])) {
  if (empty($_POST['author'])) {
    $author_error = "please enter author name";
  }else {
    $author= test_input($_POST['author']);
    $author_pattern='/^[a-zA-Z ]+$/';
    if (!preg_match($author_pattern,$author)) {
      $author_error ="please enter valid author name";
    }
  }
  if (empty($author_error)){
    $sql = "UPDATE book SET author = '$author' WHERE book_id=$bookid";
    if (mysqli_query($link,$sql)) {
      $status = '<div class="alert alert-success">Book updated successfully</div>';
    }else {
      $status = '<div class="alert alert-danger">Error occured</div>';
    }
  }
}
if (isset($_POST['pricevalue'])) {
  if (empty($_POST['price'])) {
    $price_error = "please enter price";
  }else {
    $price= test_input($_POST['price']);
    $price_pattern='/^[0-9]+$/';
    if (!preg_match($price_pattern,$price)) {
      $price_error ="please enter valid price";
    }
  }
  if (empty($price_error)){
    $sql = "UPDATE book SET price = '$price' WHERE book_id=$bookid";
    if (mysqli_query($link,$sql)) {
      $status = '<div class="alert alert-success">Book updated successfully</div>';
    }else {
      $status = '<div class="alert alert-danger">Error occured</div>';
    }
  }
}
if (isset($_POST['categoryname'])) {
  if (empty($_POST['category'])) {
    $category_error = "please enter category";
  }else {
    $category= test_input($_POST['category']);
    $category_pattern='/^[a-zA-Z ]+$/';
    if (!preg_match($category_pattern,$category)) {
      $category_error ="please enter valid category";
    }
  }
  if (empty($category_error)){
    $sql = "UPDATE book SET category = '$category' WHERE book_id=$bookid";
    if (mysqli_query($link,$sql)) {
      $status = '<div class="alert alert-success">Book updated successfully</div>';
    }else {
      $status = '<div class="alert alert-danger">Error occured</div>';
    }
  }
}
if (isset($_POST['image'])) {
  if (!isset($_FILES['book_img'])) {
    $image_error = "please select a image";
  }
  else {
    $target = "images/";
    $file_name = $_FILES['book_img']['name'];
    $file_type = $_FILES['book_img']['type'];
    $file_size = $_FILES['book_img']['size'];
    $tmp_name = $_FILES['book_img']['tmp_name'];
    $allowed = array('jpg' =>'image/jpg' ,'jpeg'=>'image/jpeg' );

    if (!in_array($file_type,$allowed)) {
      $image_error = "please select jpg/jpeg file";
    }
    $maxsize = 1*1024*1024;
    if ($file_size>$maxsize) {
      $image_error="file size is out of range";
    }
    if (in_array($file_type,$allowed) && $file_size<$maxsize && $_FILES['book_img']['error']===0) {

        $newname = rand().$file_name;
        $target = $target.$newname;
        $image = $target;
       move_uploaded_file($tmp_name,$target);


    }else {
      $image_error = "some error occured";
    }
  }
  if (empty($image_error)){
    $sql = "UPDATE book SET img = '$image' WHERE book_id=$bookid";
    if (mysqli_query($link,$sql)) {
      $status = '<div class="alert alert-success">Book updated successfully</div>';
    }else {
      $status = '<div class="alert alert-danger">Error occured</div>';
    }
  }
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <div class="row">
         <div class="col-sm-3"> </div>
          <div class="col-sm-5">
            <h4>Update Details</h4><br>
            <span><?php echo $status; ?></span>
            <form class="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Name of Book</label>
                <input type="text" name="book_name" value="" class="form-control">
                <span class="text-danger"><?php echo $bookname_error; ?></span>
              </div>
                <div class="form-group">
                <input type="submit" name="bookname" value="Update book name" class="btn btn-success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">

              </div>
              <div class="form-group">
                <label for="">Author</label>
                <input type="text" name="author" value="" class="form-control">
                <span class="text-danger"><?php echo $author_error; ?></span>
              </div>
                <div class="form-group">
                <input type="submit" name="author_name" value="Update author name" class="btn btn-success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">

              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" value="" class="form-control">
                <span class="text-danger"><?php echo $price_error; ?></span>
              </div>
                <div class="form-group">
                <input type="submit" name="pricevalue" value="Update price" class="btn btn-success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">

              </div>
              <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category" value="" class="form-control">
                <span class="text-danger"><?php echo $category_error; ?></span>
              </div>
                <div class="form-group">
                <input type="submit" name="categoryname" value="Update category" class="btn btn-success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">

              </div>
              <div class="form-group">
                <label for="">Upload Book Image</label>
                <input type="file" name="book_img" value="" class="form-control">
                <span class="text-danger"><?php echo $image_error; ?></span>
              </div>
                <div class="form-group">
                <input type="submit" name="image" value="Update image" class="btn btn-success" style="background:linear-gradient(to bottom, #000066 60%, #0066ff 100%);">

              </div>

       </form>
          </div>
            <div class="col-sm-4"> </div>
       </div>

     </div>
   </div>
 </div>
 <?php
 require_once 'footer.php';
  ?>
