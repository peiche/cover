var VIDEO_ID = 'video-overlay-video';

/**
 * Assign an id to the featured video embed
 */
var playButton = document.getElementById('video-overlay-play-button');
var $featured_video = document.querySelector('#video-overlay iframe');

if ($featured_video === null) {
  $featured_video = document.querySelector('#video-overlay video');
}

if ($featured_video && $featured_video !== null) {
  $featured_video.id = VIDEO_ID;

  var sep = '?';
  if ($featured_video.src.indexOf('?') != -1) {
    sep = '&';
  }


  if ($featured_video.src.indexOf('youtube.com') != -1) {
    // Append the embed url with the api param
    $featured_video.src += sep + 'enablejsapi=1';

    /**
     * Inject YouTube API script
     */
    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  } else if ($featured_video.src.indexOf('vimeo.com') != -1) {
    // Append the embed url with the api param
    $featured_video.src += sep + 'api=1';

    player = new Vimeo.Player($featured_video);

    // Click listener for play button
    playButton.addEventListener('click', function() {
      player.play();
    });
  } else if ($featured_video.play) {
    // Click listener for play button
    playButton.addEventListener('click', function() {
      $featured_video.play();
    });
  }
}

// Init player object
var player;

/**
 * Function called once the Youtube API loads.
 * This is dependent on checking the "Enable JavaScript API"
 * checkbox in the plugin options (/wp-admin/options-media.php).
 */
function onYouTubePlayerAPIReady() {
  // Define player as Youtube player
  player = new YT.Player(VIDEO_ID, {
    events: {
      'onReady': onPlayerReady
    }
  });
}

/**
 * Function to be called once the player is ready
 */
function onPlayerReady(event) {
  // Get play button element
  var playButton = document.getElementById('video-overlay-play-button');

  // Click listener for play button
  playButton.addEventListener('click', function() {
    player.playVideo();
  });
}
