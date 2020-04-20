<?php

  function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      return $inputText;
  }

  function sanitizeFormUsername($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ","",$inputText);
      return $inputText;
  }

  function sanitizeString($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ","",$inputText);
      $inputText = ucfirst(strtolower($inputText));
      return $inputText;
  }





  if (isset($_POST['registerButton'])) {
    //sign up ボタンが押された場合のプロセス
      $username = sanitizeFormUsername($_POST['username']);
      $firstName = sanitizeString($_POST['firstName']);
      $lastName = sanitizeString($_POST['lastName']);
      $email = sanitizeString($_POST['email']);
      $email2 = sanitizeString($_POST['email2']);
      $password = sanitizeFormPassword($_POST['password']);
      $password2 = sanitizeFormPassword($_POST['password2']);

      $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
      //質問？どうして上記ラインは$unとかに省略できないのか？ -> $username（値）は同じ条件内で一致していなければならない。省略するかしないかの統一
      if($wasSuccessful == true) { //==trueは省略可
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php"); //このif条件が正の場合、index.phpに戻る
      }
  }

 ?>
