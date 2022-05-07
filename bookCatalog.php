<?php
//include 'includes/b_catalog.php';
require 'dashboard.php';


if (isset($_SESSION['admin'])) {
  $userloggedin = $_SESSION['admin'];
  $pos = $_SESSION['pos'];

//  echo $pos;

}
else {
  header("Location: dashboard.php");
}

if (isset($_POST['save'])) {
  $book = $_POST['bname'];
  $author = $_POST['author'];
  $copies = $_POST['copies'];
  $pcopies = $_POST['pcopies'];
  $cat = $_POST['cat'];
  $isbn = $_POST['isbn'];


  $check = mysqli_query($conn, "SELECT book_name FROM book_catalog WHERE book_name='$book'");
  if (mysqli_num_rows($check)==0) {
    $query = mysqli_query($conn,"INSERT INTO book_catalog(isbn_number, book_name,	author_name,	copies,	present_copies,	cat_name)
    VALUES('$isbn','$book','$author','$copies','$pcopies','$cat')");

  }
  else {
    echo "Already in the list !";
  }
}


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="catalogForm">
       <form  method="post">
         <h1>Book Catalog</h1>
         <input type="text" name="isbn" placeholder="ISBN Number"> <br><br>
         <input type="text" name="bname" placeholder="Book Name"> <br><br>
         <input type="text" name="author" placeholder="Author Name"> <br><br>
         <input type="number" name="copies" placeholder="0"> <br><br>
         <input type="number" name="pcopies" placeholder="0"> <br><br>
         <select  name="cat" style="padding-right:5.65vw;">
           <?php
            $sql = mysqli_query($conn,"SELECT * FROM book_catagories");

            if (mysqli_num_rows($sql)>0) {
              while ($row = mysqli_fetch_assoc($sql)) { ?>

                <option> <?php echo $row['cat_name']; ?></option>


           <?php } ?>
         <?php } ?>

         </select><br><br>
         <input type="submit" name="save" value="save">
       </form>
     </div>
   </body>
 </html>
