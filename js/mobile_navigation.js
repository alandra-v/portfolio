/* VARIABLES */

const burgerNav = $(".burger-nav");
const menuOverlay = $(".overlay-menu");
let resizeTimer;
let scrolling = true;

/* FUNCTIONS */

$(document).ready(whiteIconsNecessity);

// mobile navigation transition
burgerNav.click(function () {

  $(this).toggleClass("open");

  menuOverlay.toggle();

  // disable scroll when navigation is open
  if (this.classList.contains("open")) {
    // disable scroll
    $("body").css({ "overflow": "hidden" });
    // ensure icons are black
    $("span.burger").css("background", "#000");
    $(".avd-logo-svg").attr("src", "assets/icons/avd_logo_black.svg");
  } else {
    // enable scroll
    $("body").css({ "overflow": "auto" });
    whiteIconsNecessity();
  }

});

// hide mobile navigation when window size is changed
$(window).on("resize", function () {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function () {
    if ($(window).width() > 1000) {
      menuOverlay.hide();
      burgerNav.removeClass("open");
    }
  }, 50);

  whiteIconsNecessity();
});

// if there is a background image use white icons
function whiteIconsNecessity() {
  if ($("div.background-img").length) {
    $("span.burger").css("background", "#fff");
    $(".avd-logo-svg").attr("src", "assets/icons/avd_logo.svg");
  } else {
    $("span.burger").css("background", "#000");
    $(".avd-logo-svg").attr("src", "assets/icons/avd_logo_black.svg");
  }
}

