/*************/
/* SLIDER */
/*************/

/* VARIABLES */

// get li (slideWidth) width 
let projectWidth = $("ul.previews-ul>li").width();
let gapWidth = calcGapWidth();
let slideWidth = projectWidth + gapWidth;
// console.log(slideWidth);

// start with the 1. slide
$("ul.previews-ul > li").last().prependTo(".previews-ul");

// add negative margin to the previews ul on page load
$(document).ready(function () {
  $("ul.previews-ul").css("left", "-" + slideWidth + "px");
});


/* FUNCTIONS */

// calculate gapWidth
function calcGapWidth() {

  let positionProject1 = $("ul.previews-ul li:nth-child(1)").offset().left + $("ul.previews-ul li:nth-child(1)").width();
  let positionProject2 = $("ul.previews-ul li:nth-child(2)").offset().left;
  return positionProject2 - positionProject1;

}
// console.log($("ul.previews-ul:nth-child(1)").offset());


// recalculate li width when window is resized (responsive)
$(window).resize(function () {
  projectWidth = $("ul.previews-ul>li").width();
  gapWidth = calcGapWidth();
  slideWidth = projectWidth + gapWidth;
  $("ul.previews-ul").css("left", "-" + slideWidth + "px");
});


function moveLeft() {
  $(".previews-ul").animate({
    "left": `-=${slideWidth}px`
  },
    500,
    function () {
      $(".previews-ul").css("left", "-" + slideWidth + "px");
      $("ul.previews-ul>li").first().appendTo(".previews-ul");
    });
}

function moveRight() {
  $(".previews-ul").animate({
    "left": `+=${slideWidth}px`
  },
    500,
    function () {
      $(".previews-ul").css("left", "-" + slideWidth + "px");
      $("ul.previews-ul>li").last().prependTo(".previews-ul");
    });
}


/* EVENTLISTENERS */

$(".r-a").click(function () {
  moveLeft();
  clearInterval(autoplayTimer);
  // console.log("interval cleared");
  removeTimer();
});

$(".l-a").click(function () {
  moveRight();
  clearInterval(autoplayTimer);
  removeTimer();
});



/*************/
/* AUTOPLAY */
/*************/

/* VARIABLES */

let toggle = $(".toggle");
let toggleText = $(".toggle-text");
let autoplayTimer;

/* EVENTLISTENER */

toggle.click(function (e) {
  toggleAnimated(e);
  timer(e);
});

/* FUNCTIONS */

// animation function
function toggleAnimated() {

  toggle.toggleClass("active");

  if (toggle.hasClass("active")) {
    toggleText.text("ON");
    toggleText.attr("aria-label", "Autoplay is on");
  } else {
    toggleText.text("OFF");
    toggleText.attr("aria-label", "Autoplay is off");
  }
}

// timer function
function timer() {
  if (toggle.hasClass("active")) {
    autoplayTimer = setInterval(function () {
      moveLeft();
      // console.log("slide");
      // console.log(autoplayTimer);
    }, 3000);
  } else {
    clearInterval(autoplayTimer);
  }
}

// clearInterval on left/right buttons
function removeTimer() {
  if (toggle.hasClass("active")) {
    toggle.removeClass("active");
    // console.log("class active removed");
  }
}

