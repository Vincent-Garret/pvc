$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items : 3,
        loop : true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3,
                margin: 30
            },
            992: {
                items: 4,
                margin: 30,
                loop: true,
                autoplay: true
            }
        }
    });

});