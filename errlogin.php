<?php
//connection
include'ewww.php';

//error message variable
$error = "Password or username is incorrect";

//check if the submit button is set ,
//if it is set then action will be executed
if (isset($_POST['submit'])) {


// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}

//Add post values
$username = mysqli_real_escape_string($con, $_POST['username']);
$passwords = mysqli_real_escape_string($con, $_POST['password']);
$type = "none";  
$pro = "pro";

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password, user FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $username);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
}

$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password, $user);
    $stmt->fetch();
    
    if (password_verify($passwords, $password)) {
		// Verification success! User has loggedin!
        // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
        
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $username;
        $_SESSION['id'] = $id;
        //redirect page to the index or dashboard
        //echo '<script>alert("You have successfully loggedin. Click ok to continue")</script>';
	    //echo '<script>window.location="cargo.php"</script>';
        
    } else {
        //this message will be shown if password was inccorect
        echo '<h5 style="background:red; color:black">password incorrect</h5>';
	}
} else {
    //this message will show if username is inccorect
    //echo 'Incorrect username!'; 
    header('location: errlogin.php');  
}
    //check for user level and redirect to different pages
    //according to their user level
    if($user == $type){
        header('location: tables.php');

    } elseif($user == $pro) {
        header('location: dashboard.php');

    } else {
       header('location: errlogin.php');
       //die('Incorect username or password');
    }
}


?>

<!-- Html code comes here --> 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <title>Login</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Bootstrap3 -->
        <script src="bootstrap3/jquery.js"></script>
        <script src="bootstrap3/js/bootstrap.min.js"></script>

</head>

<body class="bg-gradient-secondary.">

  <!-- Page Wrapper -->
  <!--<div id="wrapper">-->
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                
              </div>
            </li>
              
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
          
         <!--<div class="container">-->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-center">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">LOGIN</h1>
          </div>

          <hr class="col-sm-2 md-sm-0">
          <div class="alert alert-danger"><?php echo $error; ?></div>
          <!--<div class="row">-->
        <!-- wrap up the login content to be in the middle -->
          <div class="row justify-content-center">
          <!-- Adding product card -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DBM<sup>2</sup></h6>
            </div>
            <div class="card-body"> 
              <form id="myForm" action="<?php $_PHP_SELF ?>" method="POST" autocomplete="off">
              <!-- Input for username -->
              <div class="form-group">
                <!--<div class="col-sm-6 mb-3 mb-sm-0">-->
                  <label><strong>Username</strong></label>
                 <input type="text" name="username" class="form-control" placeholder="username" id="username" required>
              <!--</div>-->
            </div>
            <!-- Input for password  -->
            <div class="form-group">
                <!--<div class="col-sm-6 mb-3 mb-sm-0">-->
                  <label><strong>Password</strong></label>
                 <input type="password" name="password" class="form-control" placeholder="password" required>
              <!--</div>-->
            </div>
           
            <!-- submit  -->
            <div class="form-group">
            <!--<div class="col-sm-6 mb-3 mb-sm-0">-->
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login"> 
            </div>
            </div>
              </form>  

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<script>
// if input is empty the input 
// field will change color
$(document).ready(function(){
  $('#myForm input[type="text"],input[type="password"]').blur(function(){
    if(!$(this).val()){
      $(this).addClass("form-control alert-warning");
    } 
    else if($(this).val()){
      $(this).removeClass("form-control alert-warning");
      $(this).addClass("form-control");
    }   
  });
});

</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>