<?php
  include("includes/config.php");
  include("includes/classes/User.php"); //should be coded before Artist/Album/Songs.php
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php"); //Artist.phpがAlbum.phpより前に来ないとバグる
  include("includes/classes/Song.php");
  include("includes/classes/Playlist.php");

  //session_destroy();  マニュアルでログアウトしたい時　＊コメント化

  if(isset($_SESSION['userLoggedIn'])) { //ログイン成功の場合
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    $username = $userLoggedIn->getUsername();
    echo "<script>userLoggedIn = '$username';</script>";
  } else {
    header("Location: register.php"); //それ以外の場合、登録ページへリダイレクト
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
        <title>Welcome to Slotify!</title>

        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/script.js"></script> <!-- JQueryの前では機能しない -->
  </head>

  <body>

    <div id="mainContainer">

        <div id="topCpntainer">
            <?php include("includes/navBarContainer.php"); ?> <!-- navBarContainerへ移動 -->

            <div id="mainViewContainer">
                <div id="mainContent">
