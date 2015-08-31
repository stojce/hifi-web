var slideshow = {

  init: function() {

    Galleria.loadTheme('js/galleria/themes/fullscreen/galleria.fullscreen.min.js');

    // fullscreen button
    Galleria.ready(function (options) {

      var galleria = this;
      var button = $("<div class=\"lightbox-btn\">Light Box</div>").insertAfter(".galleria-thumbnails-container");

      button.click(function () {
        galleria.toggleFullscreen();
      });
    });

    Galleria.run(".galleria", {
      transition: "fade",
      imageCrop: true,
      fullscreenDoubleTap: true,
      showInfo: false,
      dataSource: JSON.parse(slideData),
      autoplay: 7000,
      dummy: 'img/dummy_slide.png'
    });
  },

  isCompatible: function() {
    return true;
  }

};
