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
<nav class="navbar bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav" style="width:100%;height:100vh">
      <li class="nav-item">
      <p class="fs-5 fw-normal"><i class="fa-solid fa-user"></i> Welcome <?= $_SESSION['name']?></p>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patient_dashboard.php"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="p_appointments.php"><i class="fa-solid fa-calendar-check"></i> Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="p_records.php"><i class="fa-solid fa-clipboard"></i> Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="p_new_appointment.php"><i class="fa-solid fa-calendar-days"></i> New Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="p_edit_profile.php"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>