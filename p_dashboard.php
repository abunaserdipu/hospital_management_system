<?php
if($_SESSION['email']==null){
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
<div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-success text-center">
                    <h3>Records</h3>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT patient_id FROM appointments WHERE patient_id=$s_id AND treatment!=''";
                    $record_result = $db->query($sql);
                    $appointments = array();
                    while($record_data = $record_result->fetch_assoc()){
                        array_push($appointments,$record_data['patient_id']);
                    }?>
                    <p class="fs-5 fw-normal">
                        <?= count($appointments);?>
                </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
                <div class="card-body bg-warning text-center">
                    <h3>Appointments</h3>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT patient_id FROM appointments WHERE patient_id=$s_id AND treatment=''";
                    $result = $db->query($sql);
                    $appointments = array();
                    while($data = $result->fetch_assoc()){
                        array_push($appointments,$data['patient_id']);
                    }?>
                    <p class="fs-5 fw-normal">
                        <?= count($appointments);?>
                </p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
        <div class="card">
                <div class="card-body bg-info text-center">
                    <h3>Total Patients</h3>
                </div>
            </div>
        </div> -->
    </div>
</body>
</html>