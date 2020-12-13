<?php
//check if the user is loggedin or not if then redirect to login page
//include 'session.php';
//Connection for database
include 'ewww.php';
//Select Database
$query = "SELECT * FROM stocks";
$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
<script src="bootstrap3/jquery.js"></script>
<script src="bootstrap3/js/bootstrap.min.js"></script>
</head>
<style>

body{
    background-color: #ddd;
}

input[type="text"] {
    border-radius: 3px;
    border: 1px solid #3c763d;
    font-size: 15px;
   
} 

input[type="text"]:hover {
    border: 1px solid ;
    font-size: 15px;
   
} 

</style>
<body> 
 <form action="edit.php" method="post" autocomplete="off">
     
<body style="height:1500px">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<ul class="nav navbar-nav">
<li><a href="cargo.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>
  </ul>
 </div>
</nav>
 <h1></h1>
 <div class="container">
        <div class="form-group ">
            <input class="form-control" id="myInput" type="text" placeholder="Search product to update">
        </div>
    </div>    
<form method="" action="">
<div class="container">
<!-- Submit button -->
     <input class="btn btn-success" type='submit' value='Update Selected Product' name="but_update" >
      <input class="btn btn-danger" type='Reset' value='Uncheck all' name=''>
</div>
 <div class="table-responsive">
 <table class="table table-striped">
 <thead>
 <tr class="active">
 <th>ID</th>
 <th>QUANTITY</th>
 <th>PRODUCT</th>
 <th>DELIVER</th>
 <th>SUPERMALL</th>
 <th>TEAORAEREKE</th>
 <th>ABEMAMA</th>
 <th>CHECK</th>
 </tr>


<?php
    if($result->num_rows > 0){
     while($row = mysqli_fetch_array($result) ){
         $id = $row['id'];
         $quantity = $row['quantity'];
         $product = $row['product'];
         $branch = $row['out_branch'];
         $super = $row['super_mall'];
         $teaoraereke = $row['teaoraereke'];
         $abemama = $row['abemama'];
         $available = $row['available_quantity'];
?>
 
</thead>
   <tbody id='myTable'> 
        <td><?= $id ?></td>
           <td><input type='number' name='quantity_<?= $id ?>' value='<?= $quantity ?>' ></td>
           <td><?php echo $product; ?></td>
           <td><input type='number' name='branch_<?= $id ?>' value='<?= $branch ?>' ></td>
           <td><input type='number' name='super_<?= $id ?>' value='<?= $super ?>' ></td>
           <td><input type='number' name='teao_<?= $id ?>' value='<?= $teaoraereke ?>' ></td>
            <td><input type='number' name='abemama_<?= $id ?>' value='<?= $abemama ?>' ></td>
           <td><input type='checkbox' name='update[]' value='<?= $id ?>' ></td>
              
       </tr>

<?php
  }
    }
   else
    {
	?>
	<tr>
    <th colspan="2"><h4>Akea kanoan am taibora! </h4></th>
    <th><a class="btn btn-warning" href="add_product.php">KANOAIA IKAI</a>
    </tr>
    <?php
}
?>
</tbody>
</table>

</form>


</body>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>
</html>
