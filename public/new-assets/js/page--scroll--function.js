function setHeight() {
    windowHeight = $(window).innerHeight();
    // $('.overlay').css('min-height', windowHeight);
    $('.content-scrolling-wrapper').css({  'max-height': windowHeight - 55, 'overflow-y':'auto','overflow-x':'hidden'}); 
    $('#content').css({  'min-height': windowHeight - 105}); 
};

$(document).ready(function() {
    setHeight();
    $(window).resize(function () {
        setHeight();
    });
});