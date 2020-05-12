<?php
    include("../../config.php");

    if(isset($_POST['name']) && isset($_POST['username'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $date = date("Y-m-d");

        $query = mysqli_query($con, "INSERT INTO playlists VALUES(NULL, '$name', '$username', '$date')");
        //Mysql values cannot be empty string with ''(use NULL)
    } else {
        echo "Name or username parameters not passed into file";
    }
?>
