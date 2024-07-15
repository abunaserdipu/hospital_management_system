<?php
session_start();
if ($_SESSION['email'] == null) {
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
    <title>IsDB-Hospital | Patient</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.jpg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <?php include_once("header.php") ?>
        <div class="row">
            <div class="col-md-3">
                <?php include_once("sidebar.php") ?>
            </div>
            <div class="col-md-9 mt-3">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Disease</th>
                        <th>Treatment</th>
                    </tr>
                    <?php
                    $s_id = $_SESSION['id'];
                    $sql = "SELECT patient_name,patient_age,patient_disease,treatment FROM appointments WHERE doctor_id='$s_id' AND treatment!=''";
                    $result = $db->query($sql);
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $data['patient_name'] ?></td>
                            <td><?= $data['patient_age'] ?></td>
                            <td><?= $data['patient_disease'] ?></td>
                            <td><?= $data['treatment'] ?></td>
                        </tr>
                    <?php }
                    ?>
                </table>

            </div>
        </div>
    </div>

</body>

</html>