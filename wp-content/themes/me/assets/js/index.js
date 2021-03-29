// var main = document.getElementById('main').offsetTop;

// window.onscroll = function () {
//     if (window.pageYOffset >= main) {
//         $('header#header nav.menu').addClass('menu-fixed');
//     } else {
//         $('header#header nav.menu').removeClass('menu-fixed');
//     }
// };


$(document).ready(function () {
    $("#blog-customer").owlCarousel({
        loop: false,
        dots: true,
        items: 2,
        responsive: {
            0: {
                items: 1
            },
            425: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 2
            },
            1024: {
                items: 2
            }
        },
    });

    // $("#box-slider_image").owlCarousel({
    //     loop: true,
    //     dots: false,
    //     items: 1,
    //     autoplay: true,
    //     autoplayTimeout: 4000,
    //     autoplayHoverPause: true,
    //     smartSpeed: 1000
    // });
});