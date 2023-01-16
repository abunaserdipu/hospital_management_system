<?php
if($_SESSION['email']==null){
    header("Location:doctor_login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="navbar-brand" href="#">
      <img src="assets/images/logo.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
    </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">IsDB Hospital</a>
      </li>
    </ul>
    <div class="d-flex">
      <a class="btn btn-danger" href="logout.php">Log out</a>
    </div>
  </div>
</nav>
</body>
</html>