//Jquery-Code
$(document).ready(function() {
const nextIcon ='<i class="fas fa-arrow-right"></i>';
const prevIcon ='<i class="fas fa-arrow-left"></i>';
$('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:false,
    margin:20,
    responsiveClass:true,
    nav:true,
    navText: [
        prevIcon,
        nextIcon
    ],
    dots:false,
    responsive:{
        0:{
            items:1,
             nav:false,
        },
        600: {
            items:2,
            nav:false,
        },
        990:{
            items:3,
        },
        1000:{
            items:3,
        }
    }
});
});


var typed = new Typed(".auto-input",{
strings: [
    'Your Health and Fitness Source',
    'Promoting Healthy Lifestyles'
],
// strings: ['Your health and fitness source'],
typeSpeed: 100,
backSpeed: 100,
loop: true,
});