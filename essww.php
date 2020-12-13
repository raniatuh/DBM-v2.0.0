<?php
   include('ewww.php');

   $user = $_SESSION['loggedin'];

   $ses_sql = mysqli_query($con,"select username from users where username = '$user'");

   $row = mysqli_fetch_array($ses_sql);

   $login_session = isset($row['username']) ? count($row['username']) : 0;

   if(!isset($_SESSION['loggedin'])){
      header("location:login.php");
      die();
   }
?>
