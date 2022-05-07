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

if (isset($_POST['save'])) {
  $cat = $_POST['category'];



  $check =mysqli_query($conn,"SELECT cat_name FROM book_catagories WHERE cat_name='$cat'");
  if (mysqli_num_rows($check)==0) {
     $query = mysqli_query($conn,"INSERT INTO book_catagories(cat_name) VALUES('$cat')");
  }
  else {
    echo "Inserted once !";
  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/catagory.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
    $(document).ready( function () {
             $('#myTable').DataTable();
            } );
    </script>

  </head>
  <body>
      <center>  <h1>Book Categories</h1></center>
    <div class="catForm">
      <form method="post">

        <input type="text" name="category" placeholder="Book Category Name"> <br><br>
        <input type="submit" name="save" value="save">
      </form>
    </div>

    <div class="catShow">
       <table id="myTable" >
         <thead>
           <th> Category ID</th>
           <th> Category Name</th>
           <th> Delete</th>
           
         </thead>
         <tbody>
            <?php
            $i=0;
             $sql = mysqli_query($conn,"SELECT * FROM book_catagories");

             if (mysqli_num_rows($sql)>0) {
               while ($row = mysqli_fetch_assoc($sql)) { ?>
                 <tr >
                 <td class="one"> <?php echo $row['cat_id']; ?></td>
                 <td class="two"> <?php echo $row['cat_name']; ?></td>
                 <td class="two"> <?php echo "<form method='post'><input type='submit' name='delete$i' value='delete' style='margin-left:3vw;'></form>"; ?></td>

                    <?php
                      if (isset($_POST["delete$i"])) {
                        $cid = $row['cat_id'];
                        $delete = mysqli_query($conn,"DELETE FROM book_catagories WHERE cat_id='$cid'");
                        if ($delete) {
                          echo "<script> window.location.replace('bookCategory.php')</script>";
                        }
                      }
                     ?>

                  </tr>
            <?php $i++;} ?>
          <?php } ?>


         </tbody>

       </table>
    </div>
  </body>

</html>
