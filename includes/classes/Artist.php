<?php
  class Artist {

      private $con;
      private $id;
      //private $name;

      public function __construct($con, $id) {  //アーティストID
        $this->con = $con;
        $this->id = $id;
      }


      public function getName() {
        $artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
        $artist = mysqli_fetch_array($artistQuery);
        return $artist['name'];
      }
  }
?>
