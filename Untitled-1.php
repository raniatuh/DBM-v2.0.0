<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <link rel="stylesheet" href="bootstrap3/css/bootstrap.min.css">
  <script src="bootstrap3/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap3/js/bootstrap.min.js"></script>

</head>

<body class="bg-gradient-primary">

<body>
<!--<div class="jumbotron">
<div class="container">
  <h2>Login</h2>
  <form id="myForm" action="<?php $_PHP_SELF ?>" method="POST" autocomplete="off">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
      <div class="valid-feedback">Good!</div>
      <div class="invalid-feedback">Enter username.</div>
    </div>
            <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label><strong>Product</strong></label>
                     <input type="text" name="product" class="form-control" placeholder="Product name" required>
                    <div class="valid-feedback">Nice!</div>
                 <div class="invalid-feedback">Enter password.</div>
                 </div> 
            </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
-->
<div class="container">

<!-- Page Heading -->


 <!-- Basic Card Example -->
 <div class="col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Login</h6>
        </div>
            <div class="card-body">
                <form class="user" autocomplete="off">
                      
                    <div class="form-group">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label><strong>Username</strong></label>
                                <input type="text" name="product" class="form-control" placeholder="Username">
                                    <div class="valid-feedback">Nice!</div>
                                        <div class="invalid-feedback">Enter password.</div>
                    </div> 
                        </div> 

                                <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label><strong>Password</strong></label>
                                            <input type="text" name="product" class="form-control" placeholder="Password">
                                                <div class="valid-feedback">Nice!</div>
                                                    <div class="invalid-feedback">Enter password.</div>
                                </div> 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button type="submit" class="form-control btn btn-primary">Submit</button>
                                    </div>
                                        </div>
                    </form>

    </div>
</div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


</body>

</html>
