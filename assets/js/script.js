var currentPlaylist = [];
var audioElement;

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio'); // = php class

    this.setTrack = function(src) { // = php public function
        this.audio.src = src;
    }

    this.play = function() {
        this.audio.play(); //Chrome policyによりauto playできない
    }

    this.pause = function() {
        this.audio.pause();
    }
}
