<?php
 include 'includes/connection.php';
 $conn = connect();
 session_start();
 if (isset($_POST['login'])) {
   $uname = $_POST['uname'];
   $_SESSION['uname'] =$uname;
   $pass = $_POST['pass'];
   $pos = $_POST['pos'];
   $_SESSION['pos'] = $pos;

   echo $_SESSION['pos'];
   $check = mysqli_query($conn,"SELECT * FROM user_info WHERE username ='$uname' AND password='$pass'");

   if (mysqli_num_rows($check)==1) {
      $checkPos = mysqli_query($conn,"SELECT username,user_type FROM user_info WHERE username = '$uname' AND user_type = '$pos' ");
      if (mysqli_num_rows($checkPos)==1) {
         if ($pos == 1) {
            $_SESSION['admin'] = $_SESSION['uname'];
            header("Location: dashboard.php");
         }
         elseif ($pos == 2) {
           $_SESSION['student'] = $_SESSION['uname'];
           header("Location: dashboard.php");
         }
      }

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
     <form method="post">
       <input type="text" name="uname" placeholder="Uaername">
       <input type="password" name="pass" placeholder="password">
       <select name="pos">
         <option>1</option>
         <option>2</option>
         <option>3</option>
       </select>
       <input type="submit" name="login" value="login">
     </form>
   </body>
 </html>
