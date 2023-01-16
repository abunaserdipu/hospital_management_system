<?php
session_start();
if($_SESSION['email']==null){
    header("Location:patient_login.php");
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
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
    <?php include_once("patient_header.php")?>
    <div class="row">
            <div class="col-md-3">
            <?php include_once("patient_sidebar.php")?>
            </div>
            <div class="col-md-9"> 
            <?php include_once("p_dashboard.php");?>
            </div>
        </div>
    </div>
        
</body>
</html>