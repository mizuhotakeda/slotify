<?php

    $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
    $resultArray = array();

    while($row = mysqli_fetch_array($songQuery)) {
        array_push($resultArray, $row['id']);
    }

    //json = convert php array into js array
    $jsonArray = json_encode($resultArray);

?>


<script>

    $(document).ready(function() {
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlaylist[0], currentPlaylist, false);
        updateVolumeProgressBar(audioElement.audio);

        //playbackBar
        $(".playbackBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".playbackBar .progressBar").mousemove(function(e) { // e=event
            if(mouseDown == true) {
                //set time of song, depending on position of mouse
                timeFromOffset(e, this);
            }
        });

        $(".playbackBar .progressBar").mouseup(function(e) { // e=event
            timeFromOffset(e, this);
        });

        //volumeBar
        $(".volumeBar .progressBar").mousedown(function() {
            mouseDown = true;
        });

        $(".volumeBar .progressBar").mousemove(function(e) { // e=event
            if(mouseDown == true) {
                var percentage = e.offsetX / $(this).width();
                if(percentage >= 0 && percentage <=1) {
                    audioElement.audio.volume = percentage;
                }
            }
        });

        $(".volumeBar .progressBar").mouseup(function(e) { // e=event
            var percentage = e.offsetX / $(this).width();
            if(percentage >= 0 && percentage <=1) {
                audioElement.audio.volume = percentage;
            }
        });

        $(document).mouseup(function() {
            mouseDown = false;
        });

    });

    function timeFromOffset(mouse, progressBar) {
        var percentage = mouse.offsetX / $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds);
    }

    function setTrack(trackId, newPlaylist, play) {

        $.post("includes/handlers/ajax/getSongJson.php", { songId: trackId }, function(data) { //ajax
            var track = JSON.parse(data); //convert into object
            $(".trackName span").text(track.title); //song title

            $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist }, function(data) { //Artist name
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name); //artist name
            });

            $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album }, function(data) { //album artwork
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.artworkPath); //attr = attribute
            });

            audioElement.setTrack(track); //mysql内のテーブルデータと項目一致させること, track function in script.js
            playSong();
        })

        if(play == true) {
            audioElement.play(); //script.js内にfunction有り
        }
    }

    function playSong() {

      if(audioElement.audio.currentTime == 0) {
          $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
      }

      $(".controlButton.play").hide()
      $(".controlButton.pause").show() //JQuery
      audioElement.play();
    }

    function pauseSong() {
      $(".controlButton.play").show()
      $(".controlButton.pause").hide()
      audioElement.pause();
    }

</script>


<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">

        <div id="nowPlayingLeft"> <!-- 下段左　-->
            <div class="content">
                <span class="albumLink">
                    <img class="albumArtwork" src="">
                </span>　
                <div class="trackInfo">
                    <span class="trackName">
                        <span></span>
                    </span>
                    <span class="artistName">
                        <span></span>
                    </span>
                </div>


            </div>
        </div>

        <div id="nowPlayingCenter"> <!-- 下段中央　-->
            <div class="content playerControls"> <!-- ２つのクラス -->

                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle button"> <!-- シャッフルボタン -->
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>
                    <button class="controlButton previous" title="Previous button"> <!-- 前に -->
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>
                    <button class="controlButton play" title="Play button" onclick="playSong()"> <!-- 再生 -->
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>
                    <button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()"> <!-- 一時停止 -->
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>
                    <button class="controlButton next" title="Next button"> <!-- 次に -->
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>
                    <button class="controlButton repeat" title="Repeat button"> <!-- 繰り返し -->
                        <img src="assets/images/icons/repeat.png" alt="Repeat">
                    </button>
                </div>

                <div class="playbackBar">
                    <span class="progressTime current">0.00</span> <!-- 現時間 -->
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span> <!-- 残り時間 -->
                </div>

            </div>



        </div>

        <div id="nowPlayingRight"> <!-- 下段右　-->
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume button">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
