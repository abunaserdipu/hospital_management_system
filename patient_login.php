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
    <title>IsDB-Hospital | Patient Login</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.jpg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/doctor_login.css">
</head>

<body>
    <div class="row" style="margin: 0;padding:0">
        <div class="col-md-8" style="margin: 0;padding:0">
            <img src="assets/images/patient_login.jpg" alt="Doctor Login" style="width:100%;height:100vh">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-info">
                    <h3>Patient login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter Your Password">
                        </div>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id']
                        ?>
                            <input type="hidden" name="appoint_id" value="<?= $id ?>">
                            <input class="btn btn-primary form-control mt-3" type="submit" name="login" value="LOGIN">
                    </form>
                    <div class="text-center">
                        <span class="text-bold">Have an account?</span>
                        <a href="patient_register.php">Register now</a>
                    </div>
                    <?php
                            // When clicked on doctor appointment button
                            if (isset($_POST['login'])) {
                                extract($_POST);
                                $pass = md5($password);
                                $sql = "SELECT * FROM patients WHERE email='$email' AND password='$pass'";
                                $result = $db->query($sql);
                                $data = $result->fetch_assoc();
                                if ($result->num_rows > 0) {
                                    session_start();
                                    $_SESSION['id'] = $data['id'];
                                    $_SESSION['name'] = $data['name'];
                                    $_SESSION['email'] = $data['email'];
                                    header("Location:appointment_page.php?a_id=$appoint_id");
                                } else {
                                    echo "<div class='alert alert-danger'>Email or Password don't match</div>";
                                }
                            }
                    ?>
                <?php } else { ?>
                    <!-- When want to normally log in -->
                    <input class="btn btn-primary form-control mt-3" type="submit" name="login" value="LOGIN">
                    </form>
                    <div class="text-center py-2">
                        <span class="text-bold">Don't have account?</span>
                        <a href="patient_register.php">Register now</a>
                    </div>
                    <div class="text-center">
                        <p><strong>Email:</strong> test@gmail.com</p>
                        <p><strong>Password:</strong> test123</p>
                    </div>
                </div>
            </div>

            <?php
                            if (isset($_POST['login'])) {
                                extract($_POST);
                                $pass = md5($password);
                                $sql = "SELECT * FROM patients WHERE email='$email' AND password='$pass'";
                                $result = $db->query($sql);
                                $data = $result->fetch_assoc();
                                if ($result->num_rows > 0) {
                                    session_start();
                                    $_SESSION['id'] = $data['id'];
                                    $_SESSION['email'] = $data['email'];
                                    $_SESSION['name'] = $data['name'];
                                    header("Location:patient_dashboard.php");
                                } else {
                                    echo "<div class='alert alert-danger'>Email or Password don't match</div>";
                                }
                            }
            ?>
        </div>
    </div>
<?php } ?>




</body>

</html>