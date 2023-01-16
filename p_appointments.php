<?php
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
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/brands.css">
    <link rel="stylesheet" href="plugins/fontawesome/css/solid.css">
</head>
<body>
    <div class="container-fluid">
    <?php include_once("patient_header.php") ?>
    <div class="row">
            <div class="col-md-3">
            <?php include_once("patient_sidebar.php") ?>
            </div>
            <div class="col-md-9 mt-3">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Disease</th>
                    </tr>
                    <?php
                    $s_id = $_SESSION['id'];
                        $sql = "SELECT patient_id,patient_name,patient_age,patient_disease FROM appointments WHERE patient_id='$s_id' AND treatment=''";
                        $result = $db->query($sql);
                        while($data = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $data['patient_name']?></td>
                                <td><?= $data['patient_age']?></td>
                                <td><?= $data['patient_disease']?></td>
                            </tr>
                       <?php }
            ?>
                </table>
                
            </div>
        </div>
    </div>
        
</body>
</html>