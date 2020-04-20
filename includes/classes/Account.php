<?php
  class Account {

      private $con;
      private $errorArray;

      public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
      }

      public function login($un, $pw) { //ログイン入力をSQL内で参照する
        $pw = md5($pw);
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

        if(mysqli_num_rows($query) == 1) { //SQL内のデータと照合
          return true; //正の場合
        } else {
          array_push($this->errorArray, Constants::$loginFailed); //誤の場合
          return false;
        }
      }

      public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);

        if(empty($this->errorArray) == true) { //空入力が正の場合　＊==trueは省略可
          //insert into database
          return $this->insertUserDetails($un, $fn, $ln, $em, $pw); //will be changed later
        }
        else {
          return false;
        }
      }

      public function getError($error) { //パラメターの入力にミスがある場合のfunction
        if(!in_array($error, $this->errorArray)) {
          $error = "";
        }
        return "<span class='errorMessage'>$error</span>"; //""内は’’でくくる
      }


      private function insertUserDetails($un, $fn, $ln, $em, $pw) { //dbへ送る
        $encryptedPw = md5($pw); //パスワードの暗号化（md5形式）
        $profilePic = "assets/images/profile-pics/blank-profilePic.png"; //プロフィール写真
        $date = date("Y-m-d"); //日付：年ー月ー日
        //echo var_dump($this->con); -> printed connection details
        //echo var_dump("INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
        $result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')"); //NULL=''
        //echo var_dump($result);
        //SQL内に残すユーザーのデータ値のパラメター （第一パラメターは自動設定のIDなので、'[空欄]'にする)
        //SQLのデータコラムの順番通りに列挙する。''と()の確認忘れず！
        return $result;
      }

      private function validateUsername($un) { //パラメターは($username)=($un)と省略可
      //private = within a class
        if(strlen($un) > 25 || strlen($un) < 5) { //パラメターの文字数を設定する
          array_push($this->errorArray, Constants::$usernameCharacters);
          return;
        }

        $checkusernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        //もし既存するユーザー名があった場合についてチェック
        if(mysqli_num_rows($checkusernameQuery) != 0) {
           array_push($this->errorArray, Constants::$usernameTaken);
           return;
        }

      }

      private function validateFirstName($fn) {
        if(strlen($fn) > 25 || strlen($fn) < 2) {
          array_push($this->errorArray, Constants::$firstNameCharacters);
          return;
        }
      }

      private function validateLastName($ln) {
        if(strlen($ln) > 25 || strlen($ln) < 2) {
          array_push($this->errorArray, Constants::$lastNameCharacters);
          return;
        }
      }

      private function validateEmails($em, $em2) {
        if($em != $em2) { //チェック項目１：E-Mailが双方で整合しているか
          array_push($this->errorArray, Constants::$emailsDoNotMatch);
          return;
        }
        if(! filter_var($em, FILTER_VALIDATE_EMAIL)) { //チェック項目２：E-Mailのフォーマットが正しいか
          array_push($this->errorArray, Constants::$emailInvalid);
          return;
        }
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'"); //チェック項目３：既存のメールアドレスと合致してるか
        if(mysqli_num_rows($checkEmailQuery) != 0) {
           array_push($this->errorArray, Constants::$emailTaken);
           return;
        }

      }

      private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) { //チェック項目１：パスワードが双方で整合しているか
          array_push($this->errorArray, Constants::$passwordsDoNotMatch);
          return;
        }
        if(preg_match('/[^A-Za-z0-9]/', $pw)) { //チェック項目２：使用文字の制限　^=not (A-Z,a-z,0-9以外の場合)
          array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
          return;
        }
        if(strlen($pw) > 30 || strlen($pw) < 5) { //チェック項目３：パスワードの文字数
          array_push($this->errorArray, Constants::$passwordCharacters);
          return;
        }
      }

  }



?>
