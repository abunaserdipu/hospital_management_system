<!-- Connection -->
<?php
include_once("includes/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IsDB-Hospital | Patient Register</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.jpg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="row" style="margin: 0;padding:0">
        <div class="col-md-4">
            <div class="card" style="margin-top:100px">
                <div class="card-header text-center bg-info">
                    <h3>Patient Register</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="">Patient Name:</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter patient name">
                        </div>

                        <div class="form-group">
                            <label for="">Email:</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="">Contact Number:</label>
                            <input class="form-control" type="text" name="contact" placeholder="Enter contact number">
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter Your Password">
                        </div>

                        <script src="js/drag-drop.js"></script>
                        <input class="btn btn-primary form-control mt-3" type="submit" name="register" value="REGISTER">
                    </form>
                    <div class="text-center">
                        <span class="text-bold">Already have an account?</span>
                        <a href="patient_login.php">Login</a>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['register'])) {
                extract($_POST);
                $pass = md5($password);
                $sql = "INSERT INTO patients(name,email,contact_no,password) VALUES('$name','$email','$contact','$pass')";
                $db->query($sql);
                if ($db->affected_rows > 0) {
                    header("Location:patient_login.php");
                } else {
                    echo "<div class='alert alert-danger'>Please try again</div>";
                }
            }
            ?>
        </div>

        <div class="col-md-8" style="margin: 0;padding:0">
            <img src="assets/images/patient_login.jpg" alt="Doctor Login" style="width:100%;height:100vh">


        </div>
    </div>


</body>

</html>