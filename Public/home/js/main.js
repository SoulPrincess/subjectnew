
$(window).on("scroll", function() {
    if($(window).scrollTop() > 100) {
        $(".header").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
        $(".header").removeClass("active");
    }
});
if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
    new WOW().init();
};

$('#nav-toggle').on('click', function (event) {
    event.preventDefault();
    $('#main-nav').toggleClass("open");
    $('#main-nav').toggleClass('in');

});