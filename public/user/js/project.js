$('.header-banner .owl-carousel').owlCarousel({
    loop:true,
    dots:false,
    nav:false,
    smartSpeed:2000,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:1
        },
        768:{
            items:1
        },
        991:{
            items:1
        },
        1199:{
            items:1
        }
    }
});
$('.youtube-queue .owl-carousel').owlCarousel({
    loop:true,
    margin:50,
    nav:true,
    smartSpeed:1100,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        768:{
            items:2
        },
        991:{
            items:4
        },
        1199:{
            items:4
        }
    }
});
$('.slider .owl-carousel').owlCarousel({
    loop:true,
    margin:5,
    dost:false,
    nav:true,
    smartSpeed:1700,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:1
        },
        768:{
            items:1
        },
        991:{
            items:2
        },
        1199:{
            items:2
        }
    }
});
$(document).ready(function(){
    $(window).scroll(function(){
        if( $(window).scrollTop() > 300 ){
            $('.header-top-menu').addClass('nav-scoll');
        }
        else{
            $('.header-top-menu').removeClass('nav-scoll');
        }
    });
    $("#back-to-top").click(function(){
        $("html,body").animate({
            scrollTop : 0 },100);
        return false;
    });
    // $(window).scroll(function(){
    //     if( $(window).scrollTop() < 500){
    //         $('#back-to-top').addClass('back-to-top-opacity0');}
    //         else{
    //             $('#back-to-top').removeClass('back-to-top-opacity0');}
    //         });
        // $('#click').click(function(){
        //     $('#popup').toggleClass('clicked');
        //     $this.removeClass('clicked');
        // });
        //  $('#cancel').click(function(){
        //     $('#popup').removeClass('clicked');
        });

     //    $('body').on("click", function (event) {
     //    var $trigger = $("#popup");
     //     if ($trigger !== event.target && !$trigger.has(event.target).length) {
     //         $('#popup').removeClass('clicked');
     //         // $('#bgr').removeClass('clicked');
     //     }
     // });
// });
// $(document).ready(function(){
//     $('#open').click(function (e) {
//         $('#popup').addClass('one');
//         $('#bgr').addClass('one');
//     });
//     $('#d_none').click(function () {
//         $('#popup').removeClass('one');
//         $('#bgr').removeClass('one');
//     });

//     $('#d_block').click(function () {
//         $('#popup').removeClass('one');
//         $('#bgr').removeClass('one');
//         alert('đăng ky thành công');
//     });
//     $('#bgr').on("click", function (event) {
//         var $trigger = $("#popup");
//         if ($trigger !== event.target && !$trigger.has(event.target).length) {
//             $('#popup').removeClass('one');
//             $('#bgr').removeClass('one');
//         }
//     });
// });