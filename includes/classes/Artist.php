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

      public function getSongIds() { //Copied from Album.php
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays DESC");
        $array = array();

        while($row = mysqli_fetch_array($query)) {
          array_push($array, $row['id']);
        }

        return $array;
      }
  }
?>
