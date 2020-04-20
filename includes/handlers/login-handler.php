<?php

if (isset($_POST['loginButton'])) {
  //log in ボタンが押された場合
  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  //ログイン機能
  $result = $account->login($username, $password);

  if($result) { // == true ログイン成功した場合
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
  }
}

?>
