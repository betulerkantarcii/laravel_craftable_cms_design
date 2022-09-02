$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $("#header").addClass("sticky"), 5000;
    } else {
        $("#header").removeClass("sticky");
    }
});



$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
        $("#header2").addClass("sticky"), 5000;
    } else {
        $("#header2").removeClass("sticky");
    }
});







// display dropdown menus when the user hovers over the dropdown button
$(document).ready(function(){
    $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     



// hide the element with the id "logos" when user scrolls down by 500px
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 500) {
        $("#logos").css("display", "none");

    } else {
        $("#logos").css("display", "block");
    }
});


jQuery(document).ready(function ($) {
    $("#menu").mmenu({
        "extensions": [
            "pagedim-black",
            "position-right",
            "popup",
            "fx-listitems-slide",
            "theme-dark"
        ],
        "iconbar": {
            "add": true,
            "top": [
                "<a href='#/'><i class='fa fa-home'></i></a>",
                "<a href='#/'><i class='fas fa-user-graduate'></i></a>"
            ],
            "bottom": [
                "<a href='#/'><i class='fab fa-facebook-f'></i></a>",
                "<a href='#/'><i class='fab fa-twitter'></i></a>",
                "<a href='#/'><i class='fab fa-instagram'></i></a>",
                "<a href='#/'><i class='fab fa-youtube'></i></a>"
            ]
        },
        "navbars": [
            {
                "position": "top",
                "content": [
                    "searchfield"
                ]
            }
        ]
    });
});



$('.slideust').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 7000,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: false,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 1,
            nav: true,
            dots: false
        },
        1200: {
            items: 1,
            nav: true,
            dots: false
        }
    }
})

$('#duyuru-slide').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 1,
            nav: true,
            dots: false
        },
        1200: {
            items: 1,
            nav: true,
            dots: false
        }
    }
})


$('#haber-slide').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
            dots: false
        },

        768: {
            items: 1,
            nav: true,
            dots: false
        },
        1200: {
            items: 1,
            nav: true,
            dots: false
        }
    }
})



$('#etkinlik-slide').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
            dots: true
        },

        768: {
            items: 2,
            nav: false,
            dots: true
        },
        1200: {
            items: 3,
            nav: false,
            dots: true
        }
    }
})


$('#agudeyasam').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 2,
            nav: true,
            dots: false
        },
        1200: {
            items: 3,
            nav: true,
            dots: false
        }
    }
})

$('#resim-galeri-mini').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: true,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 1,
            nav: true,
            dots: false
        },
        1200: {
            items: 1,
            nav: true,
            dots: false
        }
    }
})

$('#video-galeri-mini').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: true,
    nav: true,
    navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
    dots: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 1,
            nav: true,
            dots: false
        },
        1200: {
            items: 1,
            nav: true,
            dots: false
        }
    }
})




new WOW().init();


/*
jQuery(function ($) {

    $('#module-video').YTPlayer({
        fitToBackground: false,
        videoId: 'jKCyFB5LmPo',
        pauseOnScroll: false,
        playerVars: {
            modestbranding: 0,
            autoplay: 1,
            controls: 1,
            showinfo: 0,
            branding: 0,
            rel: 0,
            autohide: 0,
			mute: 0
        }
    });

    $('#background-video').YTPlayer({
        fitToBackground: true,
        videoId: '1DA8uuXRDFM',
        pauseOnScroll: false,
        playerVars: { 'autoplay': 1, 'controls': 0 },
        callback: function () {
            videoCallbackEvents();
        }
    });

    var videoCallbackEvents = function () {
        var player = $('#background-video').data('ytPlayer').player;

        player.addEventListener('onStateChange', function (event) {
            console.log("Player State Change", event);

            // OnStateChange Data
            if (event.data === 0) {
                console.log('video ended');
            }
            else if (event.data === 2) {
                console.log('paused');
            }
        });
    }
});
*/





$('#kampusdeyasam').owlCarousel({
    loop: true,
    responsiveClass: true,
    autoplay: true,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
    dots: false,
    responsive: {
        0: {
            items: 1,
            nav: true,
            dots: false
        },

        768: {
            items: 2,
            nav: true,
            dots: false
        },
        1200: {
            items: 3,
            nav: true,
            dots: false
        }
    }
})




$(document).ready(function () {

    // Gets the video src from the data-src on each button

    var $videoSrc;
    $('.video-btn').click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);



    // when the modal is opened autoplay it  
    $('#slidemodal').on('shown.bs.modal', function (e) {

        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src', $videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
    })


    // stop playing the youtube video when I close the modal
    $('#slidemodal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src', $videoSrc);
    })






    // document ready  
});




function restoreAndSkipContent() {
  var hidden = document.querySelector('.skip-me');

  hidden.classList.add('unhide');
  window.scroll(0, hidden.offsetHeight);
};
restoreAndSkipContent();
