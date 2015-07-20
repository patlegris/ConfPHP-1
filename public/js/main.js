$(function () {

    if (navbar = $("#navbar-top").offset()) var navbarOffsetTop = navbar.top;

    $(document).on("scroll", function (e) {
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

    $("form.delete").on("submit", function (e) {
        var current_row = $(this).parent().parent();

        e.preventDefault();

        if (confirm("Voulez-vous vraiment supprimer cette conférence ?")) {
            $("#loader").fadeIn(600);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (data, status) {
                    $("#loader").fadeOut(300, function() {
                        current_row.remove();
                        $("#message").load();
                    });
                },
                error: function (resultat, statut, erreur) {
                    $("#loader").fadeOut(300);
                }
            });
        }
    });
});