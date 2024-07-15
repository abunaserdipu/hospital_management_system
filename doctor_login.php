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
    <title>IsDB-Hospital | Doctor Login</title>
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
            <img src="assets/images/doctor_login.jpg" alt="Doctor Login" style="width:100%;height:100vh">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-info">
                    <h3>Doctor login</h3>
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
                        <input class="btn btn-primary form-control mt-3" type="submit" name="login" value="LOGIN">
                    </form>
                </div>
                <div class="text-center">
                    <p><strong>Email:</strong> test@gmail.com</p>
                    <p><strong>Password:</strong> test123</p>
                </div>

            </div>

            <?php
            if (isset($_POST['login'])) {
                extract($_POST);
                $pass = md5($password);
                $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$pass'";
                $result = $db->query($sql);
                $data = $result->fetch_assoc();
                if ($result->num_rows > 0) {
                    session_start();
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['photo'] = $data['photo'];
                    $_SESSION['id'] = $data['id'];
                    header("Location:doctor_dashboard.php");
                } else {
                    echo "<div class='alert alert-danger'>Email or Password don't match</div>";
                }
            }
            ?>
        </div>
    </div>


</body>

</html>