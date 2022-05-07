<?php
require 'dashboard.php'
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table>
       <thead>
         <tr>
           <th>SL</th>
           <th>Issue ID</th>
           <th>Book ID</th>
           <th>Issued to</th>
           <th>Return Date</th>


       </thead>
       <tbody>
         <?php
          $i=0;
           if (isset($_SESSION['student'])) {
             $student = $_SESSION['student'];
             $user = mysqli_query($conn,"SELECT * FROM issued_books WHERE issued_to='$student' ");
             if (mysqli_num_rows($user)>0) {
               while ($row = mysqli_fetch_assoc($user)) { ?>
                 <tr>

                 <td><?php echo $i; ?></td>
                 <td><?php echo $row['issued_id']; ?></td>
                 <td><?php echo $row['book_id']; ?></td>
                 <td><?php echo $row['issued_to']; ?></td>
                 <td><?php echo $row['issue_date']; ?></td>
                 <td><?php echo $row['return_date']; ?></td>

               </tr>
              <?php $i++;}
             }
           }
           elseif (isset($_SESSION['admin'])) {
             $user = mysqli_query($conn,"SELECT * FROM issued_books");

             if (mysqli_num_rows($user)>0) {
               while ($row = mysqli_fetch_assoc($user)) {?>

               <tr>
                 <td><?php echo $i; ?></td>
                 <td><?php echo $row['issued_id']; ?></td>
                 <td><?php echo $row['book_id']; ?></td>
                 <td><?php echo $row['issued_to']; ?></td>
                 <td><?php echo $row['issue_date']; ?></td>
                 <td><?php echo $row['return_date']; ?></td>

               </tr>
              <?php $i++;}
             }
           }

          ?>
       </tbody>
     </table>
   </body>
 </html>
