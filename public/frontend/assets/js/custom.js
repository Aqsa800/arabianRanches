



const button = document.querySelector('.scrollBtn');

const displayButton = () => {
    window.addEventListener('scroll', () => {


        if (window.scrollY > 100) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });
};

const scrollToTop = () => {
    button.addEventListener("click", () => {
        window.scroll({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
        console.log(event);
    });
};

displayButton();
scrollToTop();

$(document).ready(function () {
    $('.youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
jQuery(document).ready(function ($) {
    var $owl = $('.owl-carousel');
    $owl.children().each(function (index) {
        jQuery(this).attr('data-position', index);
    });
    $owl.owlCarousel({
        center: true,
        nav: false,
        loop: true,
        items: 3,
        margin: 30,
        navText: ["<i class='fa arrow-circle-left'><</i>", "<i class='fa arrow-right'>></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $(document).on('click', '.item', function () {
        $owl.trigger('to.owl.carousel', $(this).data('position'));
    });
});


// Gallery carousel Start

var owl = $('.screenshot_slider').owlCarousel({
    loop: true,
    responsiveClass: true,
    nav: true,
    margin: 0,
    autoplayTimeout: 4000,
    smartSpeed: 400,
    center: true,
    navText: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 3
        },
        1200: {
            items: 3
        }
    }
});

// Gallery carousel End
