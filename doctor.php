<?php
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
</head>
<body>
    <div class="card">
        <div class="card-header">
            Assign Doctor
        </div>
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name:</label>
            <input class="form-control" type="text" name="name" placeholder="Doctor Name">
        </div>
        <div class="form-group">
            <label for="">Photo:</label>
            <input class="form-control" type="file" name="photo">
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input class="form-control" type="email" name="email" placeholder="Doctor Email">
        </div>
        <div class="form-group">
        <label for="">Password:</label>
        <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
        <label for="">Contact:</label>
        <input class="form-control" type="text" name="contact" placeholder="Doctor Contact no">
        </div>
        <div class="form-group">
        <label for="">Type:</label>
        <select class="form-select" name="type">
            <option value="" selected disabled>Select one</option>
            <option value="1">Medicine</option>
            <option value="2">Cardiologists</option>
            <option value="3">Dermatologists</option>
        </select>
        </div>
        
        <input class="btn btn-info" type="submit" name="submit" value="ASSIGN">
    </form>
    <?php
    
    if(isset($_POST['submit'])){
        extract($_POST);
        $pname = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];
        if($error>0){
            echo $error;
            
        }else{
            $photo = "assets/images/$pname";
            move_uploaded_file($tmp,$photo);
            $pass = md5($password);
            $sql = "INSERT INTO doctors(name,photo,email,password,contact_no,type) VALUES('$name','$photo','$email','$pass','$contact','$type')";
            $db->query($sql);
            if($db->affected_rows>0){
                echo "<div class='alert alert-success'>Successfully added</div>";
            }else{
                echo "<div class='alert alert-danger'>Try Again</div>";
            }
        }
        
    }
    ?>
        </div>
    </div>
</body>
</html>