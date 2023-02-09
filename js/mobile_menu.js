/* VARIABLES */

const burgerNav = $(".burger-nav");
const nav = $("nav");
const menuOverlay = $(".overlay-menu");
let resizeTimer;
let scrolling = true;

/* FUNCTIONS */

// burger menu transition
burgerNav.click(function () {
  $(this).toggleClass("open");

  menuOverlay.toggle();

  // disable scroll when menu is open
  if (this.classList.contains("open")) {
    // disable scroll
    $("body").css({ "overflow": "hidden" });
    // ensure close button is black
    $("span.burger").css("background", "#000");
    $(".avd-logo-svg").attr("src", "icons/avd_logo_black.svg");
  } else {
    // enable scroll
    $("body").css({ "overflow": "auto" });
    if ($("div.background-img").length) {
      $("span.burger").css("background", "#fff");
      $(".avd-logo-svg").attr("src", "icons/avd_logo.svg");

    } else {
      $("span.burger").css("background", "#000");
      $(".avd-logo-svg").attr("src", "icons/avd_logo_black.svg");
    }
  }

  // replace logo with black logo when menu is open

  // $("span.burger").toggle("close");

});

// check if document has a background image 
// if so change nav icons to white
if ($("div.background-img").length) {
  $("span.burger").css("background", "#fff");
  $(".avd-logo-svg").attr("src", "icons/avd_logo.svg");
}


// hide mobile menu when window size is changed
$(window).on("resize", function (e) {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function () {
    if ($(window).width() > 1000) {
      menuOverlay.hide();
    }
  }, 100);
});

