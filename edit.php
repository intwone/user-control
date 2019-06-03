<?php
require 'config.php';

$id = 0;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']); 
}

$sql = "SELECT * FROM _users WHERE u_id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(':id', $id);
$sql->execute();

if($sql->rowCount() > 0) {
    $dataReceived = $sql->fetch();
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form method="POST">
                <div class="form-col">
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $dataReceived['u_name']; ?>" placeholder="Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $dataReceived['u_email']; ?>" placeholder="Email">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Password:</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="Confirm your password">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a class="btn btn-primary" href="index.php" role="button">Cancel</a> 
                    </div>
                    <?php
                    if(isset($_POST['name']) && !empty($_POST['name'])) {
                        $name = addslashes($_POST['name']);
                        $email = addslashes($_POST['email']);
                        $password = addslashes(MD5($_POST['password']));
                    
                        $sql = "SELECT * FROM _users WHERE u_id = :id";
                        $sql = $pdo->prepare($sql);
                        $sql->bindValue(':id', $id);
                        $sql->execute();
                    
                        if($sql->rowCount() > 0) {
                            $data1 = $sql->fetch();
                        }
                        
                        if($password == $data1['u_password']) {
                            $sql = "UPDATE _users SET u_name = :names, u_email = :email WHERE u_id = :id";
                            $sql = $pdo->prepare($sql);
                            $sql->bindValue(':names', $name);
                            $sql->bindValue(':email', $email);
                            $sql->bindValue(':id', $id);
                            $sql->execute();
                            
                            echo "<div class='container'>
                                        <h6 class='text-success'>USER UPDATED SUCCESSFULLY!</h6>
                                  </div>";
                        }
                        else {
                            echo "<div class='container'>
                                        <h6 class='text-danger'>WRONG OR UNFILLED PASSWORD!</h6>
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>