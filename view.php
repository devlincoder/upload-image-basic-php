<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        .image{
            width: 200px;
            height: 200px;
        }
        .image img{
            width: 100%;
            height: 100%;
        }
        .container{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn{
            text-decoration: none;
            padding: 5px;
            font-size: 30px;
            border: 1px solid black;
            color: black;
        }
    </style>
</head>
<body>
    <a class="btn" href="index.php">Insert</a>
    <div class="container">
    <?php
    $sql = "SELECT * FROM upload ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($images = mysqli_fetch_assoc(($result))){
            echo '<div class="image"><img src="uploads/'.$images["img_url"].'" alt="Image"/><div>';
        }
    }
    ?>
    </div>
</body>
</html>