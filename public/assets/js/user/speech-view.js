"use strict";
var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: '#898989',
    progressColor:'#E22861',
});

wavesurfer.on('ready', updateTimer)
wavesurfer.on('audioprocess', updateTimer)

wavesurfer.on('seek', updateTimer)

function updateTimer() {
  var formattedTime = secondsToTimestamp(wavesurfer.getCurrentTime());
  $('#waveform-time-indicator .time').text(formattedTime);
}

function secondsToTimestamp(seconds) {
  seconds = Math.floor(seconds);
  var h = Math.floor(seconds / 3600);
  var m = Math.floor((seconds - (h * 3600)) / 60);
  var s = seconds - (h * 3600) - (m * 60);

  h = h < 10 ? '0' + h : h;
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  return h + ':' + m + ':' + s;
}


$(document).ready(function() {
    var audioFile = $('.siglePlay').data('src');
    var correctedUrl = audioFile.replace(/\\/g, '/');

    var audioFile = SITE_URL+'/proxy.php?url='+correctedUrl;
    wavesurfer.load(audioFile);
});

function playstop() {
if (wavesurfer.isPlaying()) {
wavesurfer.pause();
document.getElementById('playIcon').style.display = 'inline-block';
document.getElementById('pauseIcon').style.display = 'none';
} else {
wavesurfer.play();
document.getElementById('playIcon').style.display = 'none';
document.getElementById('pauseIcon').style.display = 'inline-block';
}
}

// Add an event listener to detect when the audio playback ends
wavesurfer.on('finish', function () {
// Reset the icon to playIcon
document.getElementById('playIcon').style.display = 'inline-block';
document.getElementById('pauseIcon').style.display = 'none';
})
var audioMuted = false;

document.getElementById('mutedIcon').style.display = 'none';

document.getElementById('speakerButton').addEventListener('click', function () {
if (audioMuted) {
wavesurfer.setMute(false);
audioMuted = false;
document.getElementById('mutedIcon').style.display = 'none';
document.getElementById('unmutedIcon').style.display = 'inline-block';
} else {
wavesurfer.setMute(true);
audioMuted = true;
document.getElementById('mutedIcon').style.display = 'inline-block';
document.getElementById('unmutedIcon').style.display = 'none';
}

});