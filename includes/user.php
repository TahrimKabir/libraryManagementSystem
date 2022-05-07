<?php
include 'connection.php';
$conn = connect();



if (isset($_POST['reg'])) {
  $uname = $_POST['uname'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  $pos = $_POST['pos'];

  if ($pass1 == $pass2) {
    $check = mysqli_query($conn,"SELECT username from user_info");
    if (mysqli_num_rows($check)==0) {
      $query = mysqli_query($conn, "INSERT INTO user_info(username,	password,	user_type	) VALUES('$uname','$pass1','$pos')");
    }
    else {
      echo "already registered";
    }

  }
  elseif($pass1!=$pass2) {
    echo "password does not match !";
  }

}
 ?>
