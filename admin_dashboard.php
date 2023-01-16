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
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-3">
            <nav class="navbar bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Admins</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Staffs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctor.php">Doctors</a>
      </li>
    </ul>
  </div>
</nav>
            </div>
            <div class="col-md-8" style="margin: 0; padding:0;">
            <nav class="navbar navbar-expand-sm bg-dark navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
  </div>
</nav>
  <?php include_once("admins_list.php");?>
            </div>
        </div>
    </div>
        
</body>
</html>