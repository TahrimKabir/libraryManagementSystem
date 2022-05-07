<?php
include 'includes/user.php';

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="">
       <form  method="post">
         <input type="text" name="uname" value="Username"><br><br>
         <input type="password" name="pass1" placeholder="password"><br><br>
         <input type="password" name="pass2" placeholder="password"><br><br>
         <select  name="pos"><br><br>
           <option>1</option>
           <option>2</option>
           <option>3</option>
         </select><br><br>
         <input type="submit" name="reg" value="register">
       </form>
     </div>
   </body>
 </html>
