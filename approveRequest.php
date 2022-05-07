<?php
require 'dashboard.php';


if (isset($_SESSION['admin'])) {
  $userloggedin = $_SESSION['admin'];
  $pos = $_SESSION['pos'];

//  echo $pos;

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

     <table>
       <tr>
         <th>SL</th>
         <th>Book ID</th>
         <th>Request By</th>
         <th>User Type</th>
         <th>Request Date</th>
         <th>Accept</th>
         <th>Cancel</th>
       </tr>
        <?php
        $i=0;
          $query = mysqli_query($conn,"SELECT * FROM book_requests");
          if (mysqli_num_rows($query)>0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <tr>

            <td><?php echo $i;  ?></td>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['request_by']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            <td><?php echo $row['request_date'];  ?></td>

            <td><?php echo "<form method='post'><input type='submit' name='accept$i' value='accept'></form>"; ?></td>

            <?php
            if (isset($_POST["accept$i"])) {
              $bid = $row['book_id'];
              $issuedTo = $row['request_by'];
              //$issueDate = $row['request_date'];
              $usertype = $row['user_type'];

              $sql = mysqli_query($conn,"SELECT * FROM book_catalog WHERE book_id='$bid'");
               //start insert

               if (mysqli_num_rows($sql)==1) {
                 while ($r = mysqli_fetch_assoc($sql)) {

                    $bookname = $r['book_name'];
                    $author = $r['author_name'];
                  //  $reissued = "no";
                    $date = date("Y-m-d",time());
                    $return = date('Y-m-d', strtotime($date. ' + 15 days'));
                    $check = mysqli_query($conn,"SELECT book_id,issued_to FROM issued_books WHERE book_id='$bid' AND issued_to='$issuedTo'");
                    if (mysqli_num_rows($check)==0) {
                      $insert = mysqli_query($conn,"INSERT INTO issued_books(book_id,book_name,author_name,issued_to,return_date,user_type)
                      VALUES('$bid','$bookname','$author','$issuedTo','$return','$usertype')");

                      if ($insert) {

                        echo "successfully got the book !";
                        //header("Location: approveRequest.php");
                        echo "<script> window.location.replace('approveRequest.php')</script>";

                      }



                    }
                    else {
                      echo "He booked this once!";
                    }


                 }
               }

              /// finish insert

              //update present copies

               $List = mysqli_query($conn,"SELECT book_id FROM issued_books WHERE book_id ='$bid'");
               if (mysqli_num_rows($List)>0) {
                  echo "Book Total :".mysqli_num_rows($List);
                  $catalog = mysqli_query($conn,"SELECT * FROM book_catalog WHERE book_id='$bid'");
                  if (mysqli_num_rows($catalog)>0) {
                    while ($a= mysqli_fetch_assoc($catalog)) {
                      echo "total".$a['book_name']." :" .$a['copies'];
                      $pcopies = $a['copies'] -mysqli_num_rows($List);
                      echo "present : ".$pcopies;


                      $updateCatalog =  mysqli_query($conn,"UPDATE book_catalog SET present_copies='$pcopies' WHERE book_id='$bid'");
                    }
                  }

               }
               //finish updating copies
              //start delete request
              $delRequest = mysqli_query($conn,"SELECT book_requests.book_id, book_requests.request_by FROM book_requests,issued_books ");
              if (mysqli_num_rows($delRequest)>1) {
                while ($a = mysqli_fetch_assoc($delRequest)) {
                  $delete = mysqli_query($conn, "DELETE FROM book_requests WHERE request_by='$issuedTo' AND book_id='$bid'");
                }
              }

            }
             ?>

            <td><?php echo "<form method='post'><input type='submit' name='cancel$i' value='cancel'></form>"; ?></td>

            <?php
            if (isset($_POST["cancel$i"])) {
              $bid = $row['book_id'];
              $rby = $row['request_by'];
              $sql = mysqli_query($conn,"DELETE  FROM book_requests WHERE book_id='$bid' AND request_by='$rby'");
            }
             ?>


          </tr>


        <?php   $i++;
            }
          }
          echo "request : ".$i;
         ?>
     </table>
   </body>
 </html>
