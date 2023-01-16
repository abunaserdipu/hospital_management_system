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
    <!-- fontawesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/brands.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/solid.css">
</head>
<body>
  <?php $activePage = basename($_SERVER['PHP_SELF'],".php")?>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav" style="height: 100vh;">
    <li class="nav-item">
        <p class="fs-5 fw-normal"><img src="<?= $_SESSION['photo']?>" alt="Avatar Logo" style="width:40px;" class="rounded">  Welcome Dr. <?= $_SESSION['name']?></p>
    </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage=='doctor_dashboard')?'active':''?>" href="doctor_dashboard.php"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage=='appointments')?'active':''?>" href="appointments.php"><i class="fa-solid fa-suitcase-medical"></i> Appointments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage=='d_patients')?'active':''?>" href="d_patients.php"><i class="fa-solid fa-hospital-user"></i> Patients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage=='d_edit_profile')?'active':''?>" href="d_edit_profile.php"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>