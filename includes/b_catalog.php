<?php
include 'connection.php';
$conn=connect();

if (isset($_POST['save'])) {
  $book = $_POST['bname'];
  $author = $_POST['author'];
  $copies = $_POST['copies'];
  $pcopies = $_POST['pcopies'];
  $cat = $_POST['cat'];


  $check = mysqli_query($conn, "SELECT book_name FROM book_catalog WHERE book_name='$book'");
  if (mysqli_num_rows($check)==0) {
    $query = mysqli_query($conn,"INSERT INTO book_catalog(book_name,	author_name,	copies,	present_copies,	cat_name)
    VALUES('$book','$author','$copies','$pcopies','$cat')");

  }
  else {
    echo "Already in the list !";
  }
}
 ?>
