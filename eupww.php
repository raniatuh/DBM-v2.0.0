<?php
include 'session.php';

include 'ewww.php';

if(isset($_POST['submit'])){

  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){
      //values from the user
      $quantity = $_POST['quantity'];
      $product = $_POST['product'];
      $branch = $_POST['branch'];
      $super = $_POST['super'];
      $teao = $_POST['teao'];
      $abemama = $_POST['abemama'];
      //we do math here
      $total = $branch + $super + $teao + $abemama;
      $available = $quantity - $total;

     //update the table
         $sql = "UPDATE stocks SET
                      quantity='".$quantity."',quantity_out='".$total."',
                      out_branch='".$branch."',super_mall='".$super."',teaoraereke='".$teao."',abemama='".$abemama."',available_quantity='".$available."'
                      WHERE id=".$updateid;
        if(mysqli_query($con,$sql)){
         header('location: stocks.php');
         }
      } 
    }
  }


?>
