/******************/
/* SERVICES NAV */
/*****************/

$("button.services-navigation").click(function () {
  $("div.services-nav").toggle();
});


/******************/
/* DROP-DOWN'S */
/*****************/

$("button.drop-down-icon").click(function () {

  if ($(this).siblings("div.service-article").hasClass("hidden")) {
    $(this).siblings("div.service-article").slideDown().removeClass("hidden");
  } else {
    $(this).siblings("div.service-article").slideUp().addClass("hidden");
  }

})


/******************/
/* ROTATE WINGS */
/*****************/

const wingsArr = $("img.wings");

for (let i = 0; i <= wingsArr.length; i++) {
  let wing = $(wingsArr[i]);
  let rotation = i * 30;
  wingsIndex.css({
    "transform": `rotate(${rotation}deg)`
  });
  console.log(rotation);

}

