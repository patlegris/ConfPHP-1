$(function () {

    var loader = $("#loader");
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
        var modal = $("#modal-delete-post"),
            loader = $("#loader"),
            buttons = $("button");

        loader.css("opacity", 1).fadeIn(200, function () {

            $.ajax({
                url: currentForm.attr('action'),
                type: 'POST',
                data: currentForm.serialize(),

                success: function (data, status) {
                    buttons.attr('disabled', false);
                    currentForm.parent().parent().fadeOut(200);

                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        showFlashJs(data);
                        currentForm = undefined;
                    });
                },
                error: function (resultat, statut, erreur) {
                    buttons.attr('disabled', false);
                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        currentForm = undefined;
                    });
                }
            });
        });
    });

    $("[data-delete-comment]").on("click", function (e) {
        var modal = $("#modal-delete-comment"),
            loader = $("#loader"),
            buttons = $("button");

        loader.css("opacity", 1).fadeIn(200, function () {

            $.ajax({
                url: currentForm.attr('action'),
                type: 'POST',
                data: currentForm.serialize(),

                success: function (data, status) {
                    buttons.attr('disabled', false);
                    currentForm.parent().parent().fadeOut(200);

                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        showFlashJs(data);
                        currentForm = undefined;
                    });
                },
                error: function (resultat, statut, erreur) {
                    buttons.attr('disabled', false);
                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        currentForm = undefined;
                    });
                }
            });
        });
    });

    $("article.dashboard")
        .on("submit", "form.status", function (e) {
            var form = $(this),
                loader = $("#loader"),
                buttons = $("button");

            e.preventDefault();

            buttons.attr('disabled', true);
            loader.css("opacity", 1).fadeIn(200, function () {

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),

                    success: function (data, status) {
                        buttons.attr('disabled', false);
                        $("tr#" + data.id)
                            .html(data.html);

                        loader.fadeOut(200, function () {
                            showFlashJs(data.message);
                        });
                    },

                    error: function (resultat, statut, erreur) {
                        loader.fadeOut(200, function () {
                            buttons.attr('disabled', false);
                        });
                    }
                });
            });
        })

        .on("submit", "form.delete", function (e) {
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
            .fadeIn(100)
            .fadeOut(3500);
    }

    if ($("#flash-php").html().trim() !== '') {
        $("#flash-php")
            .stop()
            .hide(0)
            .fadeIn(100)
            .fadeOut(3500);
    }

    $("button.ajax").click(function () {
        var buttons = $("button"),
            url = $(this).attr('data-url');

        buttons.attr('disabled', true);
        loader.css("opacity", 1).fadeIn(200, function () {
            $.ajax({
                url: url,
                type: 'GET',

                success: function (data, status) {
                    buttons.attr('disabled', false);
                    $("table").html(data);
                    loader.fadeOut(200);
                },

                error: function (resultat, statut, erreur) {
                    buttons.attr('disabled', false);
                    loader.fadeOut(200);
                }
            });
        });
    });
});