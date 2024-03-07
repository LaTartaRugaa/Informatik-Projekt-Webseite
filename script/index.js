const media = document.querySelector(".main-video");
const pause = document.querySelector('.js-pause-video')


pause.addEventListener("click", playPauseMedia);

function playPauseMedia() {
    if (media.paused) {
      document.querySelector('.js-pause-button')
        .innerHTML = '<i class="fa-solid fa-play"></i>';
      media.play();
    } else {
      document.querySelector('.js-pause-button')
        .innerHTML = '<i class="fa-solid fa-pause"></i>';
      media.pause();
    }
  }
  