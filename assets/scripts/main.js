/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {

        // init Isotope
        var $grid = $('.grid').isotope({
          // options
        });
        // filter items on button click
        $('.filter-button-group').on( 'click', 'button', function() {
          var filterValue = $(this).attr('data-filter');
          $grid.isotope({ filter: filterValue });
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        $('.nav-pills li a').click( function(e) {
          e.preventDefault();
          if(!$(this).hasClass('active')) {
            $('.nav-pills li a').removeClass('active');
            $(this).addClass('active');
            var target = $(this).data('target');
            $('#way1, #way2, #way3, #way4').fadeOut(600);
            $('#' + target).fadeIn(400);
          }
        });
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        var $window           = $(window),
        win_height_padded = $window.height() * 1.1;
        function revealOnScroll() {
          var scrolled = $window.scrollTop(),
              win_height_padded = $window.height() * 1.1;

          // Showed...
          $(".revealOnScroll:not(.animated)").each(function () {
            var $this     = $(this),
                offsetTop = $this.offset().top;

            if (scrolled + win_height_padded > offsetTop) {
              if ($this.data('timeout')) {
                window.setTimeout(function(){
                  $this.addClass('animated ' + $this.data('animation'));
                }, parseInt($this.data('timeout'),10));
              } else {
                $this.addClass('animated ' + $this.data('animation'));
              }
            }
          });
          // Hidden...
         $(".revealOnScroll.animated").each(function (index) {
            var $this     = $(this),
                offsetTop = $this.offset().top;
            if (scrolled + win_height_padded < offsetTop) {
              $(this).removeClass('animated fadeInUp flipInX lightSpeedIn');
            }
          });
        }

        //revealOnScroll();

        $window.on('scroll', revealOnScroll);
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  $(document).ready(function() {
    $('#accordion-1').show();
      function close_accordion_section() {
          $('.accordion .accordion-section-title').removeClass('active');
          $('.accordion .accordion-section-content').slideUp(400).removeClass('open');
          $('.accordion .accordion-section .accordion-section-title i').removeClass('fa-minus-circle').addClass('fa-plus-circle');
      }
   
      $('.accordion-section-title').click(function(e) {
          // Grab current anchor value
          var currentAttrValue = $(this).data('target');
   
          if($(this).hasClass('active')) {
              close_accordion_section();
          }else {
              close_accordion_section();
   
              // Add active class to section title
              $(this).addClass('active');
              // Open up the hidden content panel
              $(this).find('i').removeClass('fa-plus-circle').addClass('fa-minus-circle');
              $('.accordion ' + currentAttrValue).slideDown(400).addClass('open'); 
          }
   
          e.preventDefault();
      });
  });

})(jQuery); // Fully reference jQuery after this point.
