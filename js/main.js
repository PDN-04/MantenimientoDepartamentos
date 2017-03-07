$(document).ready(function() {
    var mover = true;
    $(".boton").click(function(evento) {
        if (mover) {
            $("nav").animate({
                left: "0px"
            });
            mover = false;
        } else {
            $("nav").animate({
                left: "-100%"
            });
            mover = true;
        }
    });
    $(document).click(function(evento) {
        if (!mover) {
            if (!$(evento.target).hasClass('boton') && $(evento.target).has('a').context.localName != "a" && $(evento.target).has('nav').context.localName != "nav") {
                $("nav").animate({
                left: "-100%"
                });
                mover = true;
            }
        }
    });
    $(".submenu").click(function(evento) {
        $(this).children(".children").slideToggle();
        $(this).toggleClass('girar');
    });
});
