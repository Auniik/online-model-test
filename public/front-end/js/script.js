$(document).ready(function () {
    $('.venobox').venobox();
});


$('#banner').slick({
    dots: false,
    infinite: true,
    speed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500,
    responsive: [

  ]
});



$('.slider_gallary').slick({
    dots: false,
    infinite: true,
    speed: 1200,
    slidesToShow: 3,
    slidesToScroll: 2,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [

  ]
});

// mixitup js start
var mixer = mixitup('.cont');


//$('.navbar-nav') .on('click', 'li',function(){
//    $('.navbar-nav li.active').removeClass('active');
//    $(this).addClass('active');
//    
//});

// bottom to top button js start



$(Document).ready(function () {
    $(".scroll_btn").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 10000);
    });
});





$('.veiw').magnificPopup({
    type: 'image',
    gallery: {
        enabled: true
    },
    // other options
});


/*
------------------
Template Name: tekasaibd
Author: Md Hafizul Islam (hafiz)
Author Email: hafizul6280@gmail.com
----------------
*/


// Blog slider start
$('.blog_slide').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 5,
    arrows: false,
    autoplay: true,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
    }
        , {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
    }
        , {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
    }
  ]
});
