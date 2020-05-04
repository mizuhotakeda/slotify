var currentPlaylist = [];
var audioElement;

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio'); // = php class

    this.setTrack = function(track) { // = php public function, track instead of src
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function() {
        this.audio.play(); //Chrome policyによりauto playできない
    }

    this.pause = function() {
        this.audio.pause();
    }
}
