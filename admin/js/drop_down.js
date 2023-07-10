$('button.drop-down').on('click', function () {

  if ($(window).width() < 820) {
    $.Information = $(this).parent().next('div.information');
  } else {
    $.Information = $(this).parent().parent().next('div.information');
  } 
  
  if ($.Information.hasClass('hidden')) {
    $.Information.slideDown().removeClass('hidden');
    $.Information.css('display', 'flex');
    $(this).css('transform', 'rotate(180deg)');

  } else {
    $.Information.slideUp().addClass('hidden');
    $(this).css('transform', 'rotate(360deg)');
  }

});


$('.login-drop-down').click(function(e) {
  e.preventDefault();
  $('.information').toggleClass('hidden');
  if ($('.information').hasClass('hidden')) {
    $(this).css('transform', 'rotate(360deg)');
    if ($(window).width() > 1000) {
      $('.alert').css('position', 'initial');
    }
  } else {
    $(this).css('transform', 'rotate(180deg)');
    if ($(window).width() > 1000) {
      $('.alert').css('position', 'absolute');
    }
  }
});