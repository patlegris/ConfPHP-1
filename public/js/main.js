$(function () {

    var deletePost = false;
    var currentForm;

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

    $("[data-delete-post]").on("click", function(e) {
        $("#loader").fadeIn(300, function () {
            $(this).delay(500);
            $.ajax({
                url: currentForm.attr('action'),
                type: 'POST',
                data: currentForm.serialize(),
                success: function (data, status) {
                    currentForm.parent().parent().remove();
                    $("#loader").fadeOut(300, function() {
                        currentForm = undefined;
                        $("#modal-delete-post").modal("hide");
                    });
                },
                error: function (resultat, statut, erreur) {
                    $("#loader").fadeOut(300, function() {
                        currentForm = undefined;
                        $("#modal-delete-post").modal("hide");
                    });
                }
            });
        });
    });

    $("form.delete").on("submit", function (e) {
        e.preventDefault();
        currentForm = $(this);

        //$("#modal-delete-post").modal("show");
        /*if (confirm("Voulez-vous vraiment supprimer cette conférence ?")) {
            $("#loader").fadeIn(200, function () {
                $(this).delay(500);
                $.ajax({
                    url: self.attr('action'),
                    type: 'POST',
                    data: self.serialize(),
                    success: function (data, status) {
                        $("#loader").fadeOut(200, function () {
                            self.parent().parent().remove();
                            //showMessage(data);
                        });
                    },
                    error: function (resultat, statut, erreur) {
                        $("#loader").fadeOut(200);
                    }
                });
            });
        }*/

    });


    function showMessage(message) {
        $("#message")
        $("#message").fadeIn(200, function () {
            $(this).delay(1500, function () {
                $(this).fadeOut(200);
            });
        });
    }
});