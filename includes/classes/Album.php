<?php
  class Album {

      private $con;
      private $id;
      private $title;
      private $artistId;
      private $genre;
      private $artworkPath;

      public function __construct($con, $id) { //アーティストID
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artworkPath'];
      }

      public function getTitle() { //アルバム名
        return $this->title;
      }

      public function getArtist() { //アーティスト名
        return new Artist($this->con, $this->artistId);
      }

      public function getGenre() { //ジャンル名
        return $this->genre;
      }

      public function getArtworkPath() { //アルバム画像
        return $this->artworkPath;
      }

      public function getNumberOfSongs() { //曲数
        $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id'");
        // mysql内で曲数のカウント: SELECT COUNT(*) FROM songs WHERE album='アーティストid'
        return mysqli_num_rows($query);
      }
  }
?>
