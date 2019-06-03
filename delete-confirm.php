<?php

$id = addslashes($_GET['id']);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Confirm delete</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h4>Are you sure you want to delete this register?</h4>
            <a class="btn btn-success" href="delete.php?id=<?php echo $id; ?>" role="button">YES</a>
            <a class="btn btn-danger" href="index.php" role="button">NO</a>
        </div>
    </body>
</html>