<?php
require 'config.php';
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
            <table class="table table-bordered table-hover table-sm">
                <caption>List of users</caption>
                <thead class="thead-dark">
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ACTIONS</th>
                </thead>
                <tbody class="thead-dark">
                    <?php
                    $sql = "SELECT * FROM _users";
                    $sql = $pdo->query($sql);
                        
                    if($sql->rowCount() > 0) {
                        foreach($sql->fetchAll() as $users) {
                            echo '<tr>';
                            echo '<th>'.$users['u_name'].'</th>';  
                            echo '<th>'.$users['u_email'].'</th>'; 
                            echo '<th class="button">
                                        <button type="button" class="btn btn-success link">
                                            <a href="edit.php?id='.$users['u_id'].'">Edit</a>
                                        </button> 
                                        <button type="button" class="btn btn-danger link">
                                            <a href="delete-confirm.php?id='.$users['u_id'].'">Delete</a>
                                        </button>
                                  </th>';
                            echo '</tr>';
                        }
                    }
                    ?>
            </table>
            <div class="container1">
                <a class="btn btn-primary" href="insert.php" role="button">Insert new user</a> 
            </div>
        </div>
    </body>
</html>


