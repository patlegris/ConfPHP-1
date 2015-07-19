$(function() {
    asideOffsetTop = $("aside").offset().top;
    asideMarginTop = parseInt($("aside h2").css("margin-top"));
    asidePaddingRight = parseInt($("aside").css("padding-right"));

    $(document).on("scroll", function(e) {
        if ($(this).scrollTop() > asideOffsetTop - asideMarginTop) {
            $("aside").css({
                position: "fixed",
                top: 0
            });
        }
        else if (($(this).scrollTop() < asideOffsetTop - asideMarginTop)) {
            $("aside").css({
                position: "relative",
                top: 0
            });
        }
    });
});