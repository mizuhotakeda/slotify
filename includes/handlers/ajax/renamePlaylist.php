<?php
    include("../../config.php");

    if(isset($_POST['name']) && isset($_POST['playlistId'])) {
        $name = $_POST['name'];
        $playlistId = $_POST['playlistId'];

        $updateQuery = mysqli_query($con, "UPDATE playlists SET name='$name' WHERE id='$playlistId'");
    } else {
        echo "Name or username parameters not passed into file";
    }
?>
