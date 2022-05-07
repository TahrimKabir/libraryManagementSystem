<?php
/*include 'includes/connection.php';
$conn = connect();
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['student'])){
  //$userloggedin = $_SESSION['admin'];
 // $pos = $_SESSION['pos'];


}
else {
  header("Location: login.php");
}*/

require 'dashboard.php';





 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="table">

     <thead>

    <table>
      <tr>
        <th>Book ID</th>
        <th>Book Name</th>
        <th>Author Name</th>
        <th>Copies</th>
        <th>Present Copies</th>
        <th>Book Catagory</th>
        <?php if ($_SESSION['pos']==2) { ?>
        <th>Request</th>
        <?php  } ?>
        <?php if ($_SESSION['pos']==1) { ?>
        <th>Cancel</th>
        <th>Edit</th>
         <?php  } ?>
      </tr>

    </thead>
    <tbody>

      <?php
      $i=0;
        $query = mysqli_query($conn,"SELECT * FROM book_catalog");
        if (mysqli_num_rows($query)>0) {
          while ($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
              <td><?php echo $row['book_id']; ?>  </td>
              <td><?php echo $row['book_name']; ?>  </td>
              <td><?php echo $row['author_name']; ?>  </td>
              <td><?php echo $row['copies']; ?>  </td>
              <td><?php echo $row['present_copies']; ?>  </td>
              <td><?php echo $row['cat_name']; ?>  </td>
              <?php echo "<form method='post'>"; ?>

              <?php if ($_SESSION['pos']==2) { ?>

              <td><?php $bid = $row['book_id'];
              $requestby = $_SESSION['student'];
              $uType = $_SESSION['pos'];  $check1 = mysqli_query($conn,"SELECT book_id, request_by FROM book_requests WHERE book_id='$bid' AND request_by='$requestby'");
               if (mysqli_num_rows($check1)>0) {
                 echo "<input type='submit' value='requested'></form>";
               }
               elseif (mysqli_num_rows($check1)==0) {
                echo "<input type='submit' name='request$i' value='request'></form>";
               }
                ?></td>
                <td><?php  if ($_SESSION['pos']==1) {  echo "<form method='post'><input type='submit' name='edit$i' value='edit'></form>";} ?></td>
            <?php  } ?>

            <?php
               if (isset($_POST["request$i"])) {


                 $bid = $row['book_id'];
                 $requestby = $_SESSION['student'];
                 $uType = $_SESSION['pos'];

                //  echo $bid;
                //  echo $request;
                //  echo $uType;
                $check = mysqli_query($conn,"SELECT book_id, request_by FROM book_requests WHERE book_id='$bid' AND request_by='$requestby'");

                if (mysqli_num_rows($check)==0) {
                  $sql = mysqli_query($conn,"INSERT INTO book_requests(book_id,	request_by,	user_type) VALUES('$bid','$requestby','$uType')");
                }
                else {
                  echo "Sent request once!";
                }


               }
             ?>



            <?php if ($_SESSION['pos']==1) { ?>
            <td><?php echo "<form method='post'><input type='submit' name='cancel$i' value='delete'></form>" ?></td>

            <?php
               if (isset($_POST["cancel$i"])) {


                 $bid = $row['book_id'];
                // $request = $_SESSION['student'];
                 $uType = $_SESSION['pos'];
                // $returndate = $_POST['returndate'];
                //  echo $bid;
                //  echo $request;
                //  echo $uType;

                $sql = mysqli_query($conn,"DELETE  FROM book_catalog WHERE book_id='$bid'");

                if ($sql) {
                  echo "<script> window.location.replace('viewBooklist.php')</script>";
                  echo "successfully cancelled !";
                }
               }
             ?>
          <?php  } ?>
          <?php if (isset($_SESSION['admin'])) {
            // code...
           ?>
          <td><?php echo "<form method='post'><input type='submit' name='edit$i' value='edit'></form>"; ?></td>
        <?php } ?>
          <?php
           if (isset($_POST["edit$i"])) {
             $bid = $row['book_id'];
             $_SESSION['bid'] = $bid;
             $cat = $row['cat_name'];
             $_SESSION['cat'] = $cat;
             $isbn = $row['isbn_number'];
             $_SESSION['isbn'] = $isbn;
             $bname = $row['book_name'];
             $_SESSION['bname'] = $bname;
             $author = $row['author_name'];
             $_SESSION['author']=$author;
             $cpy = $row['copies'];
             $_SESSION['cpy']=$cpy;

            header("Location: edit.php");

           }
           ?>

            </tr>
        <?php
          $i++; }
        }
       ?>

    </tbody>
    </table>
</div>

   </body>
 </html>
