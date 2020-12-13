<?php 
require_once"ewww.php";

include"essww.php";

include"getsess.php";

?>

<?php 

if(isset(($_POST['submit']))) {

$sender = mysqli_real_escape_string($con,$_POST['sender']);
$receiver = mysqli_real_escape_string($con,$_POST['receiver']);
$sub = mysqli_real_escape_string($con,$_POST['subject']);
$cont = mysqli_real_escape_string($con,$_POST['content']);

$insert = "INSERT INTO message (sender, receiver, subject, content) VALUES ('$sender', '$receiver', '$sub', '$cont')";
if(mysqli_query($con, $insert)) {
    echo '<script>alert("Message sent")</script>';
    echo '<script>window.location="msg.php"</script>';
    exit;
} else {
    echo 'ERROR: could not able to execute $insert. ' .mysqli_error($con);
    die();
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Messageing</title>

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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DBM <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading">
        System
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="#/#/#/#">
          <i class="fas fa-fw fa-table"></i>
          <span>Messaging</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                
              </div>
            </li>
              
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$name?></span>
                <img class="img-profile rounded-circle" src="img/rna.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Messaging</h1>
          </div>

          <hr class="sidebar-divider">
          
          <!-- Adding product card -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Message</h6>
            </div>
            <div class="card-body">
            
              
              <form id="myForm" action="<?php $_PHP_SELF ?>" method="POST" autocomplete="off">

                <input type="hidden" name="sender" value="<?=$name?>">
                

                <!-- Input for product supplier -->
                <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label><strong>To:</strong></label>
                 <input type="text" name="receiver" class="form-control" placeholder="user..." id="subject" required>
              </div>
            </div>
              <!-- Input for product supplier -->
              <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label><strong>Subject:</strong></label>
                 <input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required>
              </div>
            </div>
            <!-- Input for product name  -->
            <div class="form-group">
               <div class="col-sm-6 mb-3 mb-sm-0">
                  <label><strong>Message:</strong></label>
                 <textarea placeholder="Message" required class="form-control" name="content"></textarea>
              </div>
            </div>
           
            <!-- Input for buttons  -->
            <div class="form-group">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Send">
                 <input type="reset" class="btn btn-secondary btn-user btn-block" value="clear"> 
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
