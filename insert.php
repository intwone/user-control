<?php
require 'config.php';

if(isset($_POST['name']) && !empty($_POST['name'])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $password = MD5(addslashes($_POST['password']));

    $sql = "INSERT INTO _users (u_name, u_email, u_password) VALUES (:names, :email, :passwords)";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':names', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':passwords', $password);
    $sql->execute();

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
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-primary" type="submit">Insert</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>