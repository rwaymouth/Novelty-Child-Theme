(function( $ ) {
    "use strict";
     
    $(function() {

        //RETINA CHECK
        var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;
        if (!$.cookie("pixel_ratio")) {
            if (pixelRatio >= 2 && navigator.cookieEnabled === true) {
                $.cookie("pixel_ratio", pixelRatio, {expires : 360});
                location.reload();
            }
        }


        $('.product .onsale').remove('.product > .onsale').clone().prependTo('.product .images');
        $('h1.page-title').removeClass('page-title').wrap('<div class="page-title" />');
        $('.widget_layered_nav ul li.chosen').prepend('<i class="icon-remove"></i>');


        /* GENERAL SETING 
        ============================================================*/
            $('p:empty').remove();
            $('ol.comment_list li:last, .blog-post-wrapper:last').addClass('last');

            if($.prettyPhoto) {
                $("a[rel^='prettyPhoto']").prettyPhoto();
            }
            
            $(".tagcloud a").removeAttr('style');
            $('#page-nav a.current').click(function(){
                return false;
            })



        /* MENU & RESPONSIVE MENU 
        ============================================================*/
            $('#menu').superfish({ 
                delay:      1000,
                speed:      'fast',
                autoArrows: true,
                animation:  { opacity:'show', height: 'show'}, 
            });

            $('.sf-sub-indicator').remove();

            
            $("#menu").clone().removeAttr('id').removeClass().addClass('res-menu clearfix').wrapInner('<ul class="sub-menu has-children" style="display: none;"/>')
.appendTo("#header nav").prepend('<a href="#">Menu</a>').wrapInner('<li class="has-children" />');

            $('.res-menu ul.sub-menu').each(function() {
                $(this).parent('li').addClass('has-children');
            });

            $('.has-children > a').click(function(e) {
                e.preventDefault();
                var $this = $(this).closest('.has-children');
                $this.siblings('li.menu-open').removeClass('menu-open').children('.sub-menu').slideUp('fast');
                $this.toggleClass('menu-open');
                if ($this.hasClass('menu-open')) {
                    $this.children('.sub-menu').slideDown('fast');
                } else {
                    $this.children('.sub-menu').slideUp('fast');
                }
                return false;
            });
                    



        /* GO TO TOP
        ============================================================*/

            //set the link
            $('#top-link').topLink({
                min: 400,
                fadeSpeed: 500
            });
            //smoothscroll
            $('#top-link').click(function(e) {
                e.preventDefault();
                $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0}, 600 ); 
            });

    });
 
}(jQuery));