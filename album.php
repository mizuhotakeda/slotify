<?php include("includes/header.php");

  if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  //$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");
  //$album = mysqli_fetch_array($albumQuery);
  $album = new Album($con, $albumId);

  //$artist = new Artist($con, $album['artist']); //Artist.phpのライン８と同じ内容であること
  $artist = $album->getArtist();

  //echo $album->getTitle() . "<br>";
  //echo $artist->getName(); //function
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>" alt="Album Artwork">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">

        <?php
          $songIdArray = $album->getSongIds();

          $i = 1;
          foreach ($songIdArray as $songId) {
              $albumSong = new Song($con, $songId);
              $albumArtist = $albumSong->getArtist(); //アルバムアーティストと曲のアーティストが違う場合の為

              echo "<li class='tracklistRow'>
                      <div class='trackCount'>
                          <img class='play' src='assets/images/icons/play-white.png'
                          <span class='trackNumber'>$i</span>
                      </div>

                      <div class='trackInfo'>
                          <span class='trackName'>" . $albumSong->getTitle() . "</span>
                          <span class='artistName'>" . $albumArtist->getName() . "</span>
                      </div>
                    </li>";

              $i = $i + 1;

          }



        ?>

    </ul>

</div>

<?php include("includes/footer.php"); ?>
