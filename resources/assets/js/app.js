$(function () {

    var currentForm;

    if (navbar = $("#navbar-top").offset()) var navbarOffsetTop = navbar.top;

    $("[name=date_start], [name=date_end]").datetimepicker({
        lang: "fr",
        format: 'Y-m-d H:i:s',
        onChangeDateTime: function (dp, $input) {
            $input.attr("value", $input.val() + ":00");
        }
    });

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
        $(".loader").css("opacity", 1).fadeIn(300, function () {
            $(this).delay(500);
            $.ajax({
                url: currentForm.attr('action'),
                type: 'POST',
                data: currentForm.serialize(),

                success: function (data, status) {
                    currentForm.parent().parent().fadeOut(500);
                    $(".loader").fadeOut(300, function () {
                        currentForm = undefined;
                        $("#modal-delete-post").modal("hide");
                        showFlashJs(data);
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

    $("article.dashboard").on("submit", "form.status", function (e) {
        var form = $(this),
            modal = $("#modal-change-status-post"),
            loader = $(modal.find(".loader"));

        e.preventDefault();

        loader.css("opacity", 1).fadeIn(300, function () {
            loader.delay(500);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),

                success: function (data, status) {
                    $("tr#" + data.id)
                        .html(data.html)
                        .toggleClass("info")
                        .toggleClass("success");

                    loader.fadeOut(300, function () {
                        modal.modal("hide");
                        showFlashJs(data.message);
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

    $("#flash-js, #flash-php").on("mousedown", function () {
        $(this).stop().fadeOut(0);
    });

    function showFlashJs(message) {
        $("#flash-js")
            .stop()
            .hide(0)
            .html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' + message)
            .slideDown(500, function () {
                $(this).fadeOut(5000);
            });
    }

    if ($("#flash-php").html().trim() !== '') {
        $("#flash-php")
            .stop()
            .hide(0)
            .slideDown(500, function () {
                $(this).fadeOut(5000);
            });
    }

});