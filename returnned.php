<?php
require 'dashboard.php';

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
        <th>SL</th>
        <th>Issue ID</th>
        <th>Return ID</th>
        <?php if (isset($_SESSION['admin'])) {?>
          <th>Return By</th>
      <?php  } ?>

        <th>Return Date</th>
        <th> Status</th>
       </thead>
       <tbody>
         <?php
          $i=0;
           if (isset($_SESSION['student'])) {
             $student = $_SESSION['student'];
             $user = mysqli_query($conn,"SELECT * FROM return_books WHERE return_by='$student' ");
             if (mysqli_num_rows($user)>0) {
               while ($row = mysqli_fetch_assoc($user)) { ?>
                 <tr>

                 <td><?php echo $i; ?></td>
                 <td><?php echo $row['issue_id']; ?></td>
                 <td><?php echo $row['return_id']; ?></td>


                 <td><?php echo $row['return_date']; ?></td>
                 <td><?php echo $row['status']; ?></td>

               </tr>
              <?php $i++;}
             }
           }
           elseif (isset($_SESSION['admin'])) {
              $user = mysqli_query($conn,"SELECT * FROM return_books ");

             if (mysqli_num_rows($user)>0) {
               while ($row = mysqli_fetch_assoc($user)) {?>

               <tr>
                 <td><?php echo $i; ?></td>
                
                 <td><?php echo $row['return_id']; ?></td>
                 <td><?php echo $row['issue_id']; ?></td>
                 <td><?php echo $row['return_by']; ?></td>
                 <td><?php echo $row['return_date']; ?></td>
                 <td><?php echo $row['status']; ?></td>


               </tr>
              <?php $i++;}
             }
           }

          ?>
       </tbody>
     </table>
   </body>
 </html>
