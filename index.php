<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Using PHP</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php if (isset($_GET["error"])) {
        $error = $_GET["error"];
        echo "<h1>" . $error . "</h1>";
    } ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="my_image" />
        <input type="submit" name="submit" value="Upload" />
    </form>
</body>

</html>