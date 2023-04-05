


/* MENU DROP DOWN ICON ACTIONS --*/
$('.menu-item-has-children').append(" <div class='drop-down-icon'><i class='menu-fadown fas fa-angle-down'></i></div> ");

//dop down menu hover
$('.menu-item-has-children').mouseover(function(){
    $(this).find('.sub-menu').addClass('submenu-active');
});
$('.menu-item-has-children').mouseout(function(){
    $(this).find('.sub-menu').removeClass('submenu-active');
});

//downdown menu click 
$(".drop-down-icon").click(function(){
    $(this).parent('.menu-item-has-children').find('.sub-menu').toggleClass('submenu-active');
    //$(this).find('.menu-fadown').toggleClass('fa-angle-up fa-angle-down');
    $('body').addClass('primal');
});

$(".drop-down-icon .menu-fadown").click(function(){
    $(this).parent('.menu-item-has-children').find('.sub-menu').toggleClass('submenu-active');
    //$(this).find('.menu-fadown').toggleClass('fa-angle-up fa-angle-down');
    $('body').addClass('primal');
});

//mouse hove and mouse out 
// $('.sub-menu').mouseover(function(){
//     $(this).parent('.menu-item-has-children').find('.menu-fadown').removeClass('fa-angle-down');
//     $(this).parent('.menu-item-has-children').find('.menu-fadown').addClass('fa-angle-up');
// });
// $('.sub-menu').mouseout(function(){
//     $(this).parent('.menu-item-has-children').find('.menu-fadown').addClass('fa-angle-down');
//     $(this).parent('.menu-item-has-children').find('.menu-fadown').removeClass('fa-angle-up');
// });

//MENU SECTION WITH RESPONSIVE CLASSES
$('.menu-button').click(function(){
    $('.menu-area').toggleClass('menu-active');
    $('body').addClass('fixedPosition');
});
$('.menu-close').click(function(){
    $('.menu-area').removeClass('menu-active');
    $('body').removeClass("fixedPosition");
});
$('.menu-area a').click(function(){
    $('.menu-area').removeClass('menu-active');
    $('body').removeClass('fixedPosition');
});

//leftblock menu
$('.left-block-menu-mobile').click(function(){
    $('.left-block-menu').toggleClass('openleftmenu');    
    $(this).toggleClass('leftmenuminus');    
});


// SLIDERS ---------------------------

$('.recently-covered-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:2},
         600:{ items:2},
        1000:{ items:4} 
    }
});

$('.subjects-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:20, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:2},
         600:{ items:2},
        1000:{ items:5} 
    }
});




//BANNER SLIDER ------------
$('.banner-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:0,
    // autoHeight:true,
    dots: true, nav: false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:1},
        1000:{ items:1} 
    }
});




$('.newarrival-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:2},
        1000:{ items:4} 
    }
});

// testimonials home
$('.testimonials-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:10,
    responsive:{ 
           0:{ items:1},
         600:{ items:1},
        1000:{ items:1} 
    }
});

$('.category-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:2},
        1000:{ items:4} 
    }
});
//gift collections home
$('.giftcollection-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:2},
        1000:{ items:4} 
    }
});

$('.occasion-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: true, nav: true,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:2},
        1000:{ items:3} 
    }
}); 

$('.offersvideo-slider .owl-carousel').owlCarousel({
    autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
    smartSpeed:450, loop:false, margin:30, 
    // autoHeight:true,
    dots: false, nav: false,
    navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    stagePadding:0,
    responsive:{ 
           0:{ items:1},
         600:{ items:1},
        1000:{ items:1} 
    }
}); 

$('.offervideo-navigation .next').click(function(){
 $('.offersvideo-slider .owl-carousel').trigger('next.owl.carousel');
});
$('.offervideo-navigation .prev').click(function(){
 $('.offersvideo-slider .owl-carousel').trigger('prev.owl.carousel');
}); 
/*
*/

// GALLERY POUP  ------------
$('.imageGallery a').simpleLightbox();
