<?php
ob_start();
session_start();
if($_SESSION['email']==null){
    header("Location:doctor_login.php");
}
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
</head>
<body>
<div class="container-fluid">
    <?php include_once("header.php") ?>
    <div class="row">
            <div class="col-md-3">
            <?php include_once("sidebar.php") ?>
            </div>
            <div class="col-md-9 mt-3">
        <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h3 class="mt-3 p-3">Prescription</h3>
        </div>
        <div class="card-body">
            <?php
            if(isset($_GET['a_id'])){
                $a_id = $_GET['a_id'];
                $p_id = $_GET['p_id'];
                $sql = "SELECT * FROM appointments WHERE doctor_id='$a_id' AND patient_id='$p_id'";
                $result = $db->query($sql);
                $data = $result->fetch_assoc();
                if($result->num_rows>0){?>
                <form action="" method="post">
            <div class="form-group">
                    <label for="" class="fs-6">Patient Name:</label>
                    <input class="form-control" type="text" name="p_name" value="<?= $data['patient_name']?>" placeholder="Patient Name">
                </div>

                
                <div class="form-group">
                    <label for="" class="fs-6">Age:</label>
                    <input class="form-control" type="number" name="p_age" value="<?= $data['patient_age']?>" placeholder="Patient Age">
                </div>
                <div class="form-group">
                    <label for="" class="fs-6">Disease:</label>
                    <textarea class="form-control" rows="5" name="p_disease" placeholder="Patient Disease"><?= $data['patient_disease']?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="" class="fs-6">Fees:</label>
                    <input class="form-control" type="number" name="fees" value="<?= $data['doctor_fees']?>" readonly>
                </div>
                
                <div class="form-group mb-3 mt-3">
                   <label for="" class="fs-6">Treatment:</label>
                <textarea class="form-control" rows="5" name="p_treatment" placeholder="Write about treatment"></textarea>
                        </div>
                        <input type="submit" name="prescription" value="Prescribed" class="btn btn-warning form-control">
            </form>
              <?php  }
            }
            if(isset($_POST['prescription'])){
                extract($_POST);
                $sql = "UPDATE appointments SET patient_name='$p_name',patient_age='$p_age',patient_disease='$p_disease',treatment='$p_treatment' WHERE  doctor_id='$a_id' AND patient_id='$p_id'";
                $db->query($sql);
                if($db->affected_rows>0){
                    header("Location:appointments.php");
                }
            }
            
            ?>
            
        </div>
    </div>
</div>
</body>
</html>