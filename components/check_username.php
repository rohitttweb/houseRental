<?php
include '../db/mysql.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];

  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo 'This username is already taken.';
  } else {
    echo 'This username is available.';
  }
}
?>
