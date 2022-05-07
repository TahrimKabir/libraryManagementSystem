<?php
require 'dashboard.php';
if (isset($_SESSION['admin'])) {
  // code...
}
else {
  header("Location: dashboard.php");
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div style='height:auto;width:20vw;border:1px solid blue; background: #e8fafa;padding: 5vw;float:right;margin-right:35vw;margin-top:10vh;'>
      <form method='post'>
<?php $isbn = $_SESSION['isbn'];
$cat = $_SESSION['cat'];
$cpy = $_SESSION['cpy'];
$bname = $_SESSION['bname'];
$auth = $_SESSION['author'];

 ?>
  ISBN Number:<br>    <input type='text' name='isbn1' value='<?php echo$isbn; ?>'><br><br>
  Book Name : <br>   <input type='text' name='bname1' value='<?php echo$bname; ?>'><br><br>
  Author Name: <br>     <input type='text' name='author1' value='<?php echo$auth; ?>'><br><br>
  Category Name: <br>     <input type='text' name='cat1' value='<?php echo$cat; ?>'><br><br>
  Copies: <br>     <input type='number' name='copy1' value='<?php echo$cpy; ?>'><br><br>
    <input type='submit' name='save' value='save'></form>

<?php if (isset($_POST['save'])) {
  $isbn1 = $_POST['isbn1'];
  $bname1 = $_POST['bname1'];
  $cat1 = $_POST['cat1'];
  $cpy1 = $_POST['copy1'];
  $auth1 = $_POST['author1'];


$bid = $_SESSION['bid'];
$return = mysqli_query($conn,"SELECT * FROM return_books ");
  $sql =mysqli_query($conn,"SELECT * FROM issued_books WHERE book_id='$bid'");
    $pcpy = $cpy1 -mysqli_num_rows($sql);
echo $bid;
   $edit = mysqli_query($conn,"UPDATE book_catalog SET isbn_number='$isbn1',cat_name='$cat1',copies='$cpy1',present_copies='$pcpy' WHERE book_id='$bid'");

   if ($edit) {
    echo "<script> window.location.replace('viewBooklist.php')</script>";
   }

} ?>
      </div>
  </body>
</html>
