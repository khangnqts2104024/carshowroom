
 $(function(){
  $('.carslide').owlCarousel({
    loop:true,
    margin:5,
    autoplay:false,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsiveClass:true,
    
    responsive:{
        0:{
            items:1,
            nav:true
        },
        768:{
            items:3,
            dotsEach:2,
            loop:true,
            nav:false
        },
        1000:{
            items:4,
            dotsEach:3,
            nav:false,
            loop:true
        }
    }
});

$('.htcptg').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsiveClass:true,
    
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            loop:true,
            nav:false
        },
        1000:{
            items:1,
            dotsEach:1,
            nav:false,
            loop:true
        }
    }
});


});
