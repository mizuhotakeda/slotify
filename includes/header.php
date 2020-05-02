<!DOCTYPE html>
<?php
  include("includes/config.php");
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php"); //Artist.phpがAlbum.phpより前に来ないとバグる
  include("includes/classes/Song.php");

  //session_destroy();  マニュアルでログアウトしたい時　＊コメント化

  if(isset($_SESSION['userLoggedIn'])) { //ログイン成功の場合
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header("Location: register.php"); //それ以外の場合、登録ページへリダイレクト
  }

?>

<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
        <title>Welcome to Slotify!</title>

        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>
  </head>

  <body>

    <div id="mainContainer">

        <div id="topCpntainer">
            <?php include("includes/navBarContainer.php"); ?> <!-- navBarContainerへ移動 -->

            <div id="mainViewContainer">
                <div id="mainContent">
