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

  if (this.classList.contains("open")) {
    // disable scroll
    $("body").css({ "overflow": "hidden" });
  } else {
    // enable scroll
    $("body").css({ "overflow": "auto" });
  }
});

// hide mobile menu when window size is changed
$(window).on("resize", function (e) {
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function () {
    if ($(window).width() > 1000) {
      menuOverlay.hide();
    }
  }, 100);
});

