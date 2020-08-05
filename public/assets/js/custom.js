/**PreLoader**/


var preloader = document.querySelector("#loading");

function myLoadFunction() {
    preloader.style.display = 'none';
};




/**Add and Remove field**/



$('#addButton').click(function () {
    $('#customer_records').clone().appendTo('.customer_records_dynamic');
    $('.customer_records_dynamic .customer_records').addClass('single remove');
    $('.single .extra-fields-customer').remove();
    $('.single').append('<a  class="remove-field btn-remove-customer"><i class="icofont-minus"></i></a>');
    $('.customer_records_dynamic > .single').attr("class", "remove");

    $('.customer_records_dynamic input').each(function () {
        var count = 0;
        //var fieldname = $(this).attr("name");
        //$(this).attr('name', fieldname + count);
        count++;
    });

});

$(document).on('click', '.remove-field', function (e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
});



function displayPayment() {
    var pay_method = document.getElementById("pay_method");
    var divc = document.getElementById("card-payment");
    var divb = document.getElementById("bank-payment")
    divc.style.display = pay_method.value == "C" ? "block" : "none";
    divb.style.display = pay_method.value == "B" ? "block" : "none";

}


$(".ic-my-course-icon").click(function () {

    if (this.id == 'setting1') {
        $("#setting-toggle1").slideToggle("slow");
    } else if (this.id == 'setting2') {
        $("#setting-toggle2").slideToggle("slow");
    } else if (this.id == 'setting3') {
        $("#setting-toggle3").slideToggle("slow");
    } else if (this.id == 'setting4') {
        $("#setting-toggle4").slideToggle("slow");
    } else if (this.id == 'setting5') {
        $("#setting-toggle5").slideToggle("slow");
    } else if (this.id == 'setting6') {
        $("#setting-toggle6").slideToggle("slow");
    } else if (this.id == 'setting7') {
        $("#setting-toggle7").slideToggle("slow");
    } else if (this.id == 'setting8') {
        $("#setting-toggle8").slideToggle("slow");
    } else if (this.id == 'setting9') {
        $("#setting-toggle9").slideToggle("slow");
    } else if (this.id == 'setting10') {
        $("#setting-toggle10").slideToggle("slow");
    } else if (this.id == 'setting11') {
        $("#setting-toggle11").slideToggle("slow");
    } else if (this.id == 'setting12') {
        $("#setting-toggle12").slideToggle("slow");
    }

});


/**Slick select**/

$(document).ready(function () {
    $("#slick").ddslick({
        width: "100%",
        imagePosition: "left",
        selectText: "Select your Card",

    });
});


/**Category**/

$(document).ready(function () {
    $('#ic-owl-category').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });


    $('#ic-owl-blog1').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-blog2').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-blog3').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-blog4').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-blog5').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-popular').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-trending').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

    $('#ic-owl-free').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            768: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });



});

/**Hide Owl next**/


$(document).ready(function () {
    var count = 0;
    $('#ic-owl-category .owl-next').click(function () {
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-category .owl-next").hide();
            $(".ic-course-view-detais").show();
            $(".owl-nav").css('right','130px');
            
            
        }

    });
});

$(document).ready(function () {
    var count = 0;
    $('#ic-owl-blog1 .owl-next').click(function () {
        
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-blog1 .owl-next").hide();
            $("#ic-blog-view1").show();
            $("#ic-owl-blog1 .owl-nav").css('right','130px');
            
        }

    });
});


$(document).ready(function () {
    var count = 0;
    $('#ic-owl-blog2 .owl-next').click(function () {
        
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-blog2 .owl-next").hide();
            $("#ic-blog-view2").show();
           $("#ic-owl-blog2 .owl-nav").css('right','130px');
        }

    });
});

$(document).ready(function () {
    var count = 0;
    $('#ic-owl-blog3 .owl-next').click(function () {
      
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-blog3 .owl-next").hide();
            $("#ic-blog-view3").show();
           $("#ic-owl-blog3 .owl-nav").css('right','130px');
        }

    });
});

$(document).ready(function () {
    var count = 0;
    $('#ic-owl-blog4 .owl-next').click(function () {
      
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-blog4 .owl-next").hide();
            $("#ic-blog-view4").show();
           $("#ic-owl-blog4 .owl-nav").css('right','130px');
        }

    });
});

$(document).ready(function () {
    var count = 0;
    $('#ic-owl-blog5 .owl-next').click(function () {
      
        count = count + 1;
        if (count == 3) {
            $("#ic-owl-blog5 .owl-next").hide();
            $("#ic-blog-view5").show();
           $("#ic-owl-blog5 .owl-nav").css('right','130px');
        }

    });
});

/**Nice Select**/

$(document).ready(function () {
    $('select').niceSelect();
});


/**Course filtering**/


$(document).ready(function(){
  $('.category-button').click(function(){
    $('.category-button').removeClass("ic-course-active");
    $(this).addClass("ic-course-active");
});
});

/**Active Demo Content**/

$(document).ready(function(){
  $('.ic-demo-content-body-warper').click(function(){
    $('.ic-demo-content-body-warper').removeClass("demo-content-active");
      $('.icon').css('display','none');
    $(this).addClass("demo-content-active");
});
});



$(document).ready(function () {
    // clicking button with class "category-button"
    $(".category-button").click(function () {


        // get the data-filter value of the button
        var filterValue = $(this).attr('data-filter');


        // show all items
        if (filterValue == "all") {
            $(".all").show("slow");
        } else {
            // hide all items
            $(".all").not('.' + filterValue).hide("slow");
            // and then, show only items with selected data-filter value
            $(".all").filter('.' + filterValue).show("slow");
        }
    });

});


/**Scroll Top**/


var scrollTop = $('.ic-scroll-top');
$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        scrollTop.css({
            'bottom': '4%',
            'opacity': '1',
            'transition': 'all .5s ease-in-out'
        });
    } else {
        scrollTop.css({
            'bottom': '-15%',
            'opacity': '0',
            'transition': 'all .5s ease-in-out'
        })
    }
});
scrollTop.on('click', function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000);
    return false;
});




/**Video Player**/

var videoPlayButton,
    videoWrapper = document.getElementsByClassName('video-wrapper')[0],
    video = document.getElementsByTagName('video')[0],
    videoMethods = {
        renderVideoPlayButton: function () {
            if (videoWrapper.contains(video)) {
                this.formatVideoPlayButton()
                video.classList.add('has-media-controls-hidden')
                videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0]
                videoPlayButton.addEventListener('click', this.hideVideoPlayButton)
            }
        },

        formatVideoPlayButton: function () {
            videoWrapper.insertAdjacentHTML('beforeend', '\
                <svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video">\
                    <circle cx="100" cy="100" r="90" fill="#fff"" stroke-width="15" stroke="#fff" />\
                    <polygon points="70, 55 70, 145 145, 100" fill="#556488"/>\
                </svg>\
            ')
        },

        hideVideoPlayButton: function () {
            video.play()
            videoPlayButton.classList.add('is-hidden')
            video.classList.remove('has-media-controls-hidden')
            video.setAttribute('controls', 'controls')
        }
    }

videoMethods.renderVideoPlayButton()




/**Carosuel button hide**/
