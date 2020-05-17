<?php include("includes/includedFiles.php");

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
        <p role="link" tabindex="0" onclick="openPage('artist.php?id=$artistId')">By <?php echo $artist->getName(); ?></p>
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
                          <img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
                          <span class='trackNumber'>$i</span>
                      </div>

                      <div class='trackInfo'>
                          <span class='trackName'>" . $albumSong->getTitle() . "</span>
                          <span class='artistName'>" . $albumArtist->getName() . "</span>
                      </div>

                      <div class='trackOptions'>
                          <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                          <img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
                      </div>

                      <div class='trackDuration'>
                          <span class='duration'>" . $albumSong->getDuration() . "</span>
                      </div>
                    </li>";

              $i = $i + 1;

          }
        ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>

    </ul>

</div>


<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
