var $ = jQuery.noConflict();

/*********************
ANONYMOUS FUNCTIONS
*********************/
$(document).ready(function() {
	console.log("JMJ");
	// accessibility();
	// mobileMenu();
	// mobileSearch();
	// slickSlider('.some-slider');
	// lb_smooth_scroll();
});
 

/*********************
DECLARED FUNCTIONS
*********************/
function accessibility() {

    // Remove focus from links
    $('body').addClass('no-focus-outline');
    
    // Listen to tab events to enable outlines (accessibility improvement)
    document.body.addEventListener('keyup', function(e) {
        if (e.which === 9) {
            document.body.classList.remove('no-focus-outline');
        }
    });

    // Helper function for Radio buttons and Check boxes. 
    // Right now we need this since we actually remove input element so we can replace it with a stylized version
    function RandCB(ele) {
        $(ele).attr('tabindex', '0');
        $(ele).on('keypress',function(e) {
            if(e.which == 13) {
                $(this).click();
            }
        });
    }

    var linkTitles = ['facebook', 'instagram', 'twitter', 'rss', 'youtube']; 
    
    for (i = 0; i < linkTitles.length; ++i) {
        $('.oxy-social-icons').find('a').each(function() {
            if ( $(this).attr('class').indexOf(linkTitles[i]) >= 0) {
                $(this).attr('title', linkTitles[i] + ' link');
                $(this).attr('aria-label', linkTitles[i] + ' link');
            }
        });
    }

    // ARIA LABEL ADDS

    // $('#input_1_1').attr('aria-label', 'Email Address');
   

    // contact page
    // $('#input_2_1').attr('aria-label', 'First Name');
    


    // WPML NAV ACCESSIBILITY
    // $('.wpml-ls-current-language > a').attr('href', '#');
    // $('.wpml-ls-current-language > a').attr('onclick', 'return false;');
    // $('.wpml-ls-current-language').on('keypress',function(e) {
    //     e.preventDefault();
    //     $(this).parents().find('.sub-menu').toggleClass('access-show');
    // });

    // TAB INDEX FIXES

    // $('#fancy_icon-12-25').attr('tabindex', '0');
    // $('.oxy-tabs > .oxy-tab').attr('tabindex', '0');

    // contact page 
    // RandCB('#label_2_5_1');

    // Accessibilify Oxy tabs
    // $('.oxy-tabs > .oxy-tab').on('keypress',function(e) {
    //     $(this).click();
    // });
}

function mobileMenu() {
    $('.mobile-button').click(function (e) {
        $('header').toggleClass('active');
        $(this).toggleClass('active');
        $('.mobile-menu').toggleClass('active');
        $('body').toggleClass('menu-active');

        if (!$('.mobile-menu').hasClass('active')) {
            $('#menu-main-1 li.menu-item-has-children').each(function () {
                $(this).removeClass('active').siblings(".lb-subnav").slideUp();
                $(this).parent().removeClass('active');
            });
        }
    });


    $('.mobile-menu li.menu-item-has-children').click(function (e) {
        $(this).toggleClass('active').children(".sub-menu").slideToggle();
        $(this).parent().toggleClass('active');
        e.stopPropagation();
    });
}

function mobileSearch() {
    if($(window).width() <= 600) {
        $('.search-bar svg').click(function() {
            $(this).parents().find('.search-input').toggleClass('active');
        });
    }
}

function slickSlider(slider) {
    $(window).on('load resize orientationchange', function() {
        $(slider).each(function(){
            var $carousel = $(this);
            /* Initializes a slick carousel only on mobile screens */
            // slick on mobile
            if ($(window).width() > 1025) {
                if ($carousel.hasClass('slick-initialized')) {
                    $carousel.slick('unslick');
                }
            }
            else{
                if (!$carousel.hasClass('slick-initialized')) {
                    $carousel.slick({
                        infinite: true,
                        speed: 400,
                        autoplay: false,
                        dots: false,
                        slidesToShow: 2,
                        slidesToScroll: 1, 
                        prevArrow: '<div class="slick-arrow slick-prev">Prev</div>', //replace arrows
                        nextArrow: '<div class="slick-arrow slick-next">Next></div>', //replace arrows
                        responsive: [{
                            breakpoint: 601, 
                             settings: "unslick",
                        }],
                    });
                }
            }
        });
    });
}

function lb_smooth_scroll() {
    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything 
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('[href*="#_"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 5
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        }
    );
}
/*********************
HELPER METHODS
*********************/

