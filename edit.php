<?php
require 'config.php';

$id = 0;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']); 

    $sql = "SELECT * FROM _users WHERE u_id = '$id'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {
        $dataReceived = $sql->fetch();
    }
} else {
    header ("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Client Report</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form method="GET" action="">
                <label for="validationDefault01">Select options</label>
                <div class="row">
                    <div class="col-2">
                        <select class="custom-select" name="options" id="options">
                            <option selected name="">Choose</option>
                            <option selected name="name">Name</option>
                            <option selected name="email">Email</option>
                            <option selected name="password">Password</option>
                        </select>
                    </div>
                    <input type="password" class="border rounded" name="select">
                </div>
                <div id="buttonSubmit">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>        
    </body>
</html>