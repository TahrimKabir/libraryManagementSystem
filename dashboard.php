<?php


 include 'includes/connection.php';
 $conn = connect();

 session_start();

 if (isset($_SESSION['admin']) || isset($_SESSION['student'])){
   //$userloggedin = $_SESSION['admin'];
  // $pos = $_SESSION['pos'];


 }
 else {
   header("Location: login.php");
 }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="css/admin.css">
   </head>
   <body>
     <nav>
       <ul>
         <?php if (isset($_SESSION['admin'])) {?>


         <li><a href="bookCategory.php">Catagory</a></li>
         <li><a href="bookCatalog.php">Add Book</a></li>

         <li><a href="approveRequest.php">Approve Request<sup style="color:red;font-family:cursive;"><b><?php $r = mysqli_query($conn,"SELECT * FROM book_requests");
         echo mysqli_num_rows($r); ?></b></sup></a></li>
         <li><a href="returnBook.php">Return Book</a></li>
         <?php } ?>
         <li><a href="viewBookList.php"> Book details</a> </li>
         <li><a href="issuedBook.php"> Issued Books</a> </li>
         <li><a href="returnned.php"> Returnned Books</a> </li>

       <li><form method="post"><input type="submit" name="logout" value="logout"></form></li>
       <?php if (isset($_POST["logout"])) {
              session_destroy();
       } ?>



     </ul>
     </nav>
   </body>
 </html>
