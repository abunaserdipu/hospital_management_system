<?php
include_once("includes/db_config.php");
  
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
  
<div class="mt-5">
  <h2 class="text-center fs-1 fw-bolder">Our Doctors</h2>
  <div class="mt-4 p-5 bg-info">
    <div class="row">
    <?php
  $sql = "SELECT * FROM doctors";
  $result = $db->query($sql);
  $department = array("","Medicine","Cardiologists","Dermatologists");
  
  while($data = $result->fetch_assoc()){ ?>
    <div class="col-md-3">
        <div class="card">
  <img class="card-img-top" src="<?= $data['photo'] ?>" alt="Card image">
  <div class="card-body text-center">
    <h4 class="card-title"><?= $data['name'] ?></h4>
    <p class="card-text"><?php 
      if(array_key_exists($data['type'],$department)){
        foreach($department as $index=>$value){
          if($data['type']==$index)
          echo $value;
        }
        }?></p>
        <p><i class="fa-solid fa-dollar-sign"></i><?= $data['fees']?></p>
        <!-- passing id for showing a different page after login -->
    <a href="patient_login.php?id=<?= $data['id']?>" class="btn btn-primary">Appointment</a>
  </div>
</div>
        </div>
  <?php }
  ?>
        
    </div> 
  </div>
</div>
</body>
</html>