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

    $("[data-delete-post]").on("click", function (e) {
        $(".loader").fadeIn(300, function () {
            $(this).delay(500);
            $.ajax({
                url: currentForm.attr('action'),
                type: 'POST',
                data: currentForm.serialize(),
                success: function (data, status) {
                    currentForm.parent().parent().remove();
                    $(".loader").fadeOut(300, function () {
                        currentForm = undefined;
                        $("#modal-delete-post").modal("hide");
                        showFlash(data);
                    });
                },
                error: function (resultat, statut, erreur) {
                    $(".loader").fadeOut(300, function () {
                        currentForm = undefined;
                        $("#modal-delete-post").modal("hide");
                    });
                }
            });
        });
    });

    $("section").on("submit", "form.status", function (e) {
        var form = $(this),
            postId = form.attr("id"),
            modal = $("#modal-change-status-post"),
            loader = $(modal.find(".loader"));

        e.preventDefault();

        loader.fadeIn(300, function () {
            loader.delay(500);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),

                success: function (data, status) {
                    $("tr#" + postId)
                        .html(data)
                        .toggleClass("info")
                        .toggleClass("success");

                    loader.fadeOut(300, function () {
                        modal.modal("hide");
                    });
                },

                error: function (resultat, statut, erreur) {
                    loader.fadeOut(300, function () {
                        modal.modal("hide");
                    });
                }
            });
        });
    }).on("submit", "form.delete", function (e) {
        e.preventDefault();
        currentForm = $(this);
    });

    $("#flash").on("mousedown", function() {
        $(this).stop().fadeOut(500);
    });

    function showFlash(message) {
        $("#flash")
            .stop()
            .html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' + message)
            .slideDown(500, function () {
                $(this).delay(5000);
                $(this).slideUp(500);
            });
    }
});