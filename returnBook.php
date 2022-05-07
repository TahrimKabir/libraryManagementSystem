<?php
//include 'includes/connection.php';

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="">
      <input type="text" name="" placeholder="search here" id="input">
    </div>
     <div class="">
       <table>
         <thead>
           <tr>
             <th>SL</th>
             <th>Issue ID</th>
             <th>Book ID</th>
             <th>Issued to</th>
             <th>Return Date</th>
             <th>Return</th>
             <th>Reissue</th>

           </tr>
         </thead>
         <tbody id="search">


         <?php
         $i=0;
            $query = mysqli_query($conn,"SELECT * FROM issued_books");
            if (mysqli_num_rows($query)>0) {
               while ($row = mysqli_fetch_assoc($query)) {  $s = $row['reissued']; ?>
                 <tr>

                   <?php echo "<form method='post'>"; ?>

                   <td><?php echo $i; ?></td>
                   <td><?php echo $row['issued_id']; ?></td>
                   <td><?php echo $row['book_id']; ?></td>
                   <td><?php echo $row['issued_to']; ?></td>
                   <td contenteditable="true"><?php echo $row['return_date']; ?></td>
                   <td><?php echo "<input type='submit' name='return$i'value='return'> </form>"; ?></td>
                   <td><?php  if($s=='no') {
                     echo "<form method='post'><input type='submit' name='reissue$i'value='reissue'> </form>";
                   }elseif ($s=='yes') {
                     echo "<input type='submit' value='reissued' style='color:green;'>";
                   }  ?></td>

                   <?php
                    if (isset($_POST["return$i"])) {
                     $issueid =$row['issued_id'];
                     $bid = $row['book_id'];
                     $returneddate= date("Y-m-d",time());
                     $toReturn = $row['return_date'];
                     $returnby= $row['issued_to'];
                     if ($returneddate>$toReturn) {
                       $status = "Fined";
                     }
                     elseif ($returneddate<=$toReturn) {
                       $status ="return";
                     }

                     $check = mysqli_query($conn,"SELECT * FROM issued_books WHERE issued_id='$issueid'");
                     if (mysqli_num_rows($check)==1) {
                       $check_return = mysqli_query($conn,"SELECT * FROM return_books WHERE issue_id='$issueid'");
                       if (mysqli_num_rows($check_return)==0) {
                        $query1=mysqli_query($conn,"INSERT INTO return_books(	issue_id, book_id,	return_date,return_by,status) VALUES('$issueid','$bid','$returneddate','$returnby','$status')");
                        if ($query1) {
                          $return = mysqli_query($conn,"SELECT * FROM return_books WHERE book_id='$bid' AND issue_id='$issueid'");
                          if (mysqli_num_rows($return)>0) {
                             echo "Book Total :".mysqli_num_rows($return);
                             $catalog = mysqli_query($conn,"SELECT * FROM book_catalog WHERE book_id='$bid'");
                             if (mysqli_num_rows($catalog)>0) {
                               while ($a= mysqli_fetch_assoc($catalog)) {
                                 echo "total".$a['book_name']." :" .$a['copies'];
                                 $pcopies = $a['copies'];
                                 $pcopies = $a['present_copies'] +mysqli_num_rows($return);
                                 echo "present : ".$pcopies;


                                 $updateCatalog =  mysqli_query($conn,"UPDATE book_catalog SET present_copies='$pcopies' WHERE book_id='$bid'");
                               }
                             }

                          }
                          echo "<script> window.location.replace('returnBook.php')</script>";
                        }
                       }
                       else {
                         echo "Returned";
                       }

                     }

                     //delete returned from issue
                     $deleteIssue = mysqli_query($conn,"SELECT issued_books.issued_id FROM issued_books,return_books WHERE return_books.issue_id = issued_books.issued_id");
                     if (mysqli_num_rows($deleteIssue)==1) {
                       while ($delr = mysqli_fetch_assoc($deleteIssue)) {
                         $id_issued = $delr['issued_id'];
                         $delete = mysqli_query($conn,"DELETE FROM issued_books WHERE issued_id='$id_issued'");
                         if ($delete) {
                           echo "<script> window.location.replace('returnBook.php')</script>";
                         }
                       }
                     }



                    }


                  //reissue

                    if (isset($_POST["reissue$i"])) {
                    $date = date("Y-m-d",time());
                    $issueid =$row['issued_id'];
                //    $date = $row['return_date'];
                      $return = date('Y-m-d', strtotime($date. ' + 30 days'));
                      $reissuedTo = $row['issued_to'];
                      $reissue = mysqli_query($conn,"UPDATE issued_books SET return_date = '$return',reissued='yes' WHERE issued_id='$issueid' ");
                      if ($reissue) {
                        echo "<script> window.location.replace('returnBook.php')</script>";
                        //echo "Reissued";
                      echo  $return;
                      }

                    //  echo "string";

                    }

                    ?>
                 </tr>
            <?php  $i++; }
            }
          ?>


        </tbody>
       </table>


     </div>
  </body>

  <script>
$(document).ready(function(){
$("#input").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#search tr").filter(function() {
 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>
</html>
