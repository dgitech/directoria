(function ($) {
    "use strict";



    //sorting toggle
    $('.sorting span').on('click',function () {
        $(this).toggleClass('fa-sort-amount-asc fa-sort-amount-desc');
    });


    /*External Library init
    ------------------------*/
    // Star rating
    $(".stars").barrating({
        theme: 'fontawesome-stars'
    });




    /* owl carousel custom nav trigger function*/
    function customTrigger(slideNext,slidePrev,targetSlider){

        $(slideNext).on( 'click', function() {
            targetSlider.trigger('next.owl.carousel');
        });

        $(slidePrev).on( 'click', function() {
            targetSlider.trigger('prev.owl.carousel');
        });

    }


    // director detail page slider init
    var $dirImgGal = $('.directory_image_gallery');
    if( $dirImgGal.length ){

        $dirImgGal.owlCarousel({
            items: 1
        });

    }


    customTrigger('.directory_image_galler_wrap span.next', '.directory_image_galler_wrap span.prev', $dirImgGal);

    //   register page js
    $( 'form input, form textarea' ).on( 'focusin', function () {

        var $label = $(this).parents('.form-group').find('label');

        $(this).val() !== '' ? $label.addClass('not_empty') : $label.removeClass('not_empty');

    });

    $( 'form input, form textarea' ).on( 'focusout', function () {

        var $label = $(this).parents('.form-group').find('label');

        $(this).val() !== '' ? $label.addClass('not_empty') : $label.removeClass('not_empty');

    });


    var $labels = $('label');
    ( $( 'input , textarea' ).val() !== '' ) ? $labels.addClass( 'not_empty' ) : $labels.removeClass( 'not_empty' );

})(jQuery);