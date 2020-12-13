<?php
//check if user is loggedin
include 'essww.php';

//get session data
include 'getsess.php';

//connection
include'ewww.php';

//this will delete the product
if(isset($_GET['action'])){
  $id = $_GET['id'];
  mysqli_query($con, 'delete from stocks where id=' .$id);
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

  <title>Stock</title>

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
          <span>Stock</span></a>
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

      
          <!--<form class="d-none d-sm-inline-block">
            <div class="form-group input-group-append">
              <input type="text" id="myInput" class="form-control bg-light border-0 small" placeholder="Search for stock" aria-label="Search" aria-describedby="basic-addon2"  autocomplete="off">
              <div class="input-group-append">
              </div>
            </div>
          </form>-->

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$name ?></span>
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
          <h1 class="h3 mb-2 text-gray-800">Stock table</h1>
          <a href="addwww.php" class=" btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add product</a>
          </div>

          <hr class="sidebar-divider">

          <form class="form-group">
            <div class="form-group">
              <input type="text" id="myInput" class="form-control bg-light" placeholder="Search for stock" aria-label="Search" aria-describedby="basic-addon2"  autocomplete="off">
              <div class="input-group-append">
              </div>
            </div>
          </form> 

          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Stocks</h6>
            </div>
            <div class="card-body"> 
              <div class="table-responsive table-hover">
                <table class="table table-bordered" id="dataTable."  cellspacing="0">


                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Quantity-Out</th>
                      <th>Delivered</th>
                      <th>Damange</th>
                      <th>Available</th>
                      <th>Action</th>
                    </tr>

<?php
       
            //get data from database
            //Select Database
            $query = "SELECT * FROM stocks ORDER BY added DESC";
            $result = mysqli_query($con,$query); 

            //Fetch Data form database
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
          ?>
                  

                  </thead>
                 
                  <tbody id="myTable">
                    <tr>
                      <td><?php echo $row['product']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['quantity_out']; ?></td>
                      <td><?php echo $row['out_branch']; ?></td>
                      <td><?php echo $row['damage']; ?></td>
                      <td><?php echo $row['available']; ?></td>
                      <td><a href="ewwup.php?id=<?php echo $row['id']; ?>"  datatoggle="tooltip" title="View full product detail" class=" btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i></a>|
                      <a href="tables.php?id=<?php echo $row['id']; ?>&action=delete" onclick="return confirm('Are you sure you want to delete this product?')" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i></a></i></a>
                      </td>
                    </tr>
<?php
  }
}
else
{
  ?>
  <tr>
    <th colspan="3"><h4>Akea kanoan am table!</h4></th>
    <th><a class="btn btn-danger" href="addwww.php">KANOAIA IKAI</a>
    </tr>
    <?php
}
?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Quantity-Out</th>
                      <th>Delivered</th>
                      <th>Damange</th>
                      <th>Available</th>
                      <th>Action</th>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; DBM  v 2.0.0</span>
            <a href="#">Kiriprogrammers</a>
            <p>RaniatuK.inc</p>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Logout</a>
        </div>
      </div>
    </div>
  </div>

 <!-- Filtering the stock table --> 
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