// Charger jQuery
(function($) {
    // Charger le plugin
    $(document).ready(function() {
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            fade: true,
            cssEase: 'linear'
        });
        
        $('.product-slider').slick({
            dots: false,
            speed: 500,
            slidesToShow: 6,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            centerMode: true,
        });
    });
}) (jQuery);