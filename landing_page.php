<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="css/landing.css">
</head>
<body>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/doctor.jpg" alt="Los Angeles" class="d-block" style="width:100%">
      <div class="carousel-caption carousel-title">
        <h3>We have experienced doctors</h3>
        <p>They are ready to support you!</p>
        <button class="btn btn-info">Doctor Appointment</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/patient.jpg" alt="Chicago" class="d-block" style="width:100%">
      <div class="carousel-caption carousel-title">
        <h3>Modern equipment & silent environment</h3>
        <p>make our patient happy!</p>
        <button class="btn btn-info">Doctor Appointment</button>
      </div> 
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</body>
</html>