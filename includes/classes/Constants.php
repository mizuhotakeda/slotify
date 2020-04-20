<?php

  class Constants { //質問？以下の順番は関係ある？ -> ない
    //register.phpとAccount.php内の各項目のエラーメッセージを置き換え
    //static = ::(Wコロン)使う

    //登録時のエラーメッセージ↓
    public static $passwordsDoNotMatch = "Your passwords do not match.";
    public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters.";
    public static $passwordCharacters = "Your password must be between 5 and 30 characters.";
    public static $emailInvalid = "Email is invalid.";
    public static $emailsDoNotMatch = "Your emails do not match.";
    public static $emailTaken = "This email is already in use.";
    public static $lastNameCharacters = "Your last name must be between 2 and 25 characters.";
    public static $firstNameCharacters = "Your first name must be between 2 and 25 characters.";
    public static $usernameCharacters = "Your username must be between 5 and 25 characters.";
    public static $usernameTaken = "This username already exists.";

    //ログイン時のエラーメッセージ↓
    Public static $loginFailed = "Your username or password was inccorect."; 
  }

?>
