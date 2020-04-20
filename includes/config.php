<?php

  ob_start();
  session_start(); //セッション開始

  $timezone = date_default_timezone_set("Europe/Warsaw");

  $con = mysqli_connect("localhost", "root", "", "slotify");
  //("サーバー名", "ユーザー名", "パスワード","データベース名")
  if(mysqli_connect_errno()) { //エラーの場合
    echo "Failed to connect: " . mysqli_connect_errno();
  }

?>
