// (function($){
// 	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
// 	  if (!$(this).next().hasClass('show')) {
// 		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
// 	  }
// 	  var $subMenu = $(this).next(".dropdown-menu");
// 	  $subMenu.toggleClass('show');

// 	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
// 		$('.dropdown-submenu .show').removeClass("show");
// 	  });

// 	  return false;
// 	});
// })(jQuery)




$(document).ready(function() {

    $('ul.tabs li').click(function() {
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    })

})





// window.onscroll = function() {myFunction()};

// var navbar = document.getElementById("main-header");
// var sticky = navbar.offsetTop;


$(window).scroll(function() {
    if ($(this).scrollTop() > 80) {
        $('header').addClass("sticky");
    } else {
        $('header').removeClass("sticky");
    }
});



// scroll to top //

var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});