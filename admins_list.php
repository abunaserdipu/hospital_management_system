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
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap-5.2.1/css/bootstrap.min.css">
    <script src="plugins/bootstrap-5.2.1/js/bootstrap.bundle.js"></script>
</head>
<body>
    <section>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                <div class="d-flex justify-content-between">
                <h3>Admins List</h3>
                <form action="" method="post">
                    <input type="search" name="query" placeholder="Search Admins">
                    <input type="submit" name="search" value="search">
                </form>
                </div>
                </div>
                <div class="card-body">
                <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>
            
            <?php 
            if(empty($_POST['search'])){
                $sql = "SELECT * FROM admins";
                $result = $db->query($sql);
                while($data = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $data['id']?></td>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                            <?php 
                            if($data['type']==1){
                                echo "Super Admin";
                                }
                            else if($data['type']==2){
                                echo "Admin";
                                }
                                ?>
                        </td>
                    </tr>
               <?php }}else{
                    if(isset($_POST['search'])){
                        extract($_POST);
                        $sql = "SELECT * FROM admins WHERE name LIKE '%$query%'";
                        $result = $db->query($sql);
                        if($result->num_rows>0){
                            while($data = $result->fetch_assoc()){?>
                                <tr>
                                    <td><?= $data['id']?></td>
                                    <td><?= $data['name']?></td>
                                    <td><?= $data['email']?></td>
                                    <td>
                                        <?php 
                                        if($data['type']==1){
                                            echo "Super Admin";
                                            }
                                        else if($data['type']==2){
                                            echo "Admin";
                                            }
                                            ?>
                                    </td>
                                </tr>
                               <?php 
                               }
                            }else{
                                echo "<div class='toast show'>
                                            <div class='toast-header bg-danger'>
                                              <strong class='me-auto'>Sorry!</strong>
                                              <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                                            </div>
                                            <div class='toast-body'>
                                              <p>No result found</p>
                                            </div>
                                          </div>";
                                          $sql = "SELECT * FROM admins";
                $result = $db->query($sql);
                while($data = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?= $data['id']?></td>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                            <?php 
                            if($data['type']==1){
                                echo "Super Admin";
                                }
                            else if($data['type']==2){
                                echo "Admin";
                                }
                            }
                        } 
                    }
                 } ?>
                        </td>
                    </tr>
            
                
           
           </table>
                </div>
            </div>
            
            
        </div>
    </section>
</body>
</html>