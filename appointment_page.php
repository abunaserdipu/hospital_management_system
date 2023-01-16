<?php
session_start();
if($_SESSION['email']== null){
    header("Location:patient_login.php");
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
    <div class="row d-flex justify-content-center" style="margin: 0;padding:0;">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white text-center">
                <h1 class=" mt-3 p-3 ">Doctor Appointment</h1>
            </div>
            <div class="card-body">
            <form action="" method="post">
                    
                <?php
                    $a_id = $_GET['a_id'];
                    $dsql = "SELECT id,name,email,fees,type FROM doctors WHERE id=$a_id";
                    // dsql doctors table query
                    // a_id means appointment_id
                    $department = array("","Medicine","Cardiologists","Dermatologists");
                    $result = $db->query($dsql);
                    $data = $result->fetch_assoc();
                    if($result->num_rows>0){?>
                        <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Doctor Name:</label>
                        <input class="form-control" readonly type="text" value="<?= $data['name']?>">
                        </div>
                        <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Email:</label>
                        <input class="form-control" readonly type="email" value="<?= $data['email']?>">
                        </div>
                        <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Fees:</label>
                        <input class="form-control" name="d_fees" readonly type="number" value="<?= $data['fees']?>">
                        </div>
                        <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Type:</label>
                        <input class="form-control" readonly type="text" value="<?if(array_key_exists($data['type'],$department)){
        foreach($department as $index=>$value){
          if($data['type']==$index)
          echo $value;
        }
        }?>">
                        </div>
                        <input type="hidden" name="d_id" value="<?= $data['id']?>">
                   <?php }
                   $s_email = $_SESSION['email'];
                   $psql = "SELECT id,name,email,contact_no,age FROM patients WHERE email='$s_email'";
                   // psql patients table query
                   $result = $db->query($psql);
                   $data = $result->fetch_assoc();
                   if($result->num_rows>0){?>
                    <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Patient Name:</label>
                        <input class="form-control" name="p_name" readonly type="text" value="<?= $data['name']?>">
                        </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Age:</label>
                        <input class="form-control" name="p_age" readonly type="text" value="<?= $data['age']?>">
                        </div>
                        <div class="form-group mb-3 mt-3">
                        <label for="email" class="fs-6">Email:</label>
                        <input class="form-control" readonly type="email" value="<?= $data['email']?>">
                        </div>
                        <div class="form-group mb-3 mt-3">
                        <label for="" class="fs-6">Contact:</label>
                        <input class="form-control" readonly type="text" value="<?= $data['contact_no']?>">
                        </div>
                        <input type="hidden" name="p_id" value="<?= $data['id']?>">
                   <?php }?>
                   <div class="form-group mb-3 mt-3">
                   <label for="" class="fs-6">Disease Description:</label>
                <textarea class="form-control" rows="5" name="p_disease" placeholder="Write about your disease"></textarea>
                        </div>
                        <input type="submit" name="confirm" value="CONFIRM" class="btn btn-info form-control">
                
                
                </form>
                <?php
                if(isset($_POST['confirm'])){
                    extract($_POST);
                    $sql = "INSERT INTO appointments(patient_name,patient_age,patient_disease,doctor_fees,doctor_id,patient_id) VALUES('$p_name','$p_age','$p_disease','$d_fees','$d_id','$p_id')";
                    $db->query($sql);
                    if($db->affected_rows>0){
                        header("Location:patient_dashboard.php");
                    }
                }
                ?>
            </div>
        </div>
        </div>
    </div>

</body>
</html>