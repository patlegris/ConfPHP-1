$(function() {

    if (navbar = $("#navbar-top").offset()) var navbarOffsetTop = navbar.top;

    $(document).on("scroll", function(e) {
        if ($(this).scrollTop() > navbarOffsetTop) {
            $("#navbar-top").addClass("navbar-fixed-top");
            $("body > .container").css("margin-top", 66);
            $("aside").css({
                position: "fixed",
                top: 66
            });
        }
        else if (($(this).scrollTop() < navbarOffsetTop)) {
            $("#navbar-top").removeClass("navbar-fixed-top");
            $("body > .container").css("margin-top", 0);
            $("aside").css({
                position: "relative",
                top: 0
            });
        }
    });

    $("form.delete").on("submit", function(e) {
        e.preventDefault();
        $.post(
            $(this).attr('action'),
            $(this).serialize(),
            function(data) {
                console.log("data : " + data);
            }
        );
    })
});