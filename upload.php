<?php
include "connect.php";

if (isset($_POST["submit"]) && isset($_FILES["my_image"])) {
    $img_name = $_FILES["my_image"]["name"];
    $img_size = $_FILES["my_image"]["size"];
    $tmp_name = $_FILES["my_image"]["tmp_name"];
    $error = $_FILES["my_image"]["error"];

    if ($error === 0) {
        if ($img_size > 125000) {
            $error = "Sorry , your flie is too large.";
            header("Location: index.php?error=$error");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); // jpg , png ,....
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc; //rename file
                $img_upload_path = 'uploads/'.$new_img_name; // link to store
                move_uploaded_file($tmp_name,$img_upload_path); // move file to store

                //insert to database
                $sql = "INSERT INTO upload(img_url) VALUES('$new_img_name')";
                mysqli_query($conn,$sql);
                header("Location: view.php");
            } else {
                $error = "You can't upload files of this type";
                header("Location: index.php?error=$error");
            }
        }
    } else {
        $error = "Unknown error occurred!";
        header("Location: index.php?error=$error");
    }
} else {
    header("Location:index.php");
}
