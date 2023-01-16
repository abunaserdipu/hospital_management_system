<?php
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
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-success text-center">
                    <h3>Case Solved</h3>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT doctor_id FROM appointments where doctor_id=$s_id AND treatment!=''";
                    $solve_result = $db->query($sql);
                    $appointments = array();
                    while($solve_data = $solve_result->fetch_assoc()){
                        array_push($appointments,$solve_data['doctor_id']);
                    }?>
                    <p class="fs-5 fw-normal">
                        <?= (count($appointments));?>
                </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
                <div class="card-body bg-warning text-center">
                    <h3>Total Appointments</h3>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT doctor_id FROM appointments where doctor_id=$s_id AND treatment=''";
                    $appoint_result = $db->query($sql);
                    $appointments = array();
                    while($appoint_data = $appoint_result->fetch_assoc()){
                        array_push($appointments,$appoint_data['doctor_id']);
                    }?>
                    <p class="fs-5 fw-normal">
                        <?= (count($appointments));?>
                </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
                <div class="card-body bg-info text-center">
                    <h3>Total Patients</h3>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT doctor_id FROM appointments where doctor_id=$s_id AND treatment!=''";
                    $total_result = $db->query($sql);
                    $appointments = array();
                    while($total_data = $total_result->fetch_assoc()){
                        array_push($appointments,$total_data['doctor_id']);
                    }?>
                    <p class="fs-5 fw-normal">
                        <?= (count($appointments));?>
                </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>