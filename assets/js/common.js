$(document).ready(function() {
    $(".sp-menu-item, .menu-overlay a").click(function() {
        $(".menu-overlay, .sp-menu-item, body").toggleClass("change");
    });

    $(".service-scroll").click(function() {
        var target = $(this).attr("data-target");
        var top = $(target).offset().top;
        if (windowsWidth > 768) {
            $(window).scrollTop(top - 200);
        } else {
            $(window).scrollTop(top - 200);
        }
    })

    $('.fv-slider, .bottom-slider').slick({
        infinite: true,
        variableWidth: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 8000,
        pauseOnHover: false,
        cssEase: 'linear'
    });
});