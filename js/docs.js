/**
 * This is basic script for the project
 */

!function ($) {
	
$(function(){
	
	// Disable certain links in docs
    $('section [href^=#]').click(function (e) {
      e.preventDefault();
    })

    // make code pretty
    window.prettyPrint && prettyPrint();

    //Check to see if the window is top if not then display button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });


        // Back to top Scroll
        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: '0px'
            }, 1500);
        });
    
    // fix sub nav on scroll
    var $win = $(window)
      , $nav = $('.subnav')
      , navTop = $('.subnav').length && $('.subnav').offset().top - 40
      , isFixed = 0

    processScroll()

    $win.on('scroll', processScroll)

    function processScroll() {
      var i, scrollTop = $win.scrollTop()
      if (scrollTop >= navTop && !isFixed) {
        isFixed = 1
        $nav.addClass('subnav-fixed')
      } else if (scrollTop <= navTop && isFixed) {
        isFixed = 0
        $nav.removeClass('subnav-fixed')
      }
    }
	
});


}(window.jQuery)