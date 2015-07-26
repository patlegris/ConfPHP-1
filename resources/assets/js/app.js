$(function () {

    var loader = $("#loader");
    var flash = $("#flash");
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
                        showFlash(data);
                        currentForm = undefined;
                    });
                },

                error: function (res, status, error) {
                    buttons.attr('disabled', false);

                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        currentForm = undefined;
                        showFlash('Erreur lors du chargement (' + res.status + ') ' + error, true);
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
                        showFlash(data);
                        currentForm = undefined;
                    });
                },

                error: function (res, status, error) {
                    buttons.attr('disabled', false);

                    loader.fadeOut(200, function () {
                        modal.modal("hide");
                        currentForm = undefined;
                        showFlash('Erreur lors du chargement (' + res.status + ') ' + error, true);
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
                        $("tr#" + data.id).html(data.html);

                        loader.fadeOut(200, function () {
                            showFlash(data.message);
                        });
                    },

                    error: function (res, status, error) {
                        buttons.attr('disabled', false);

                        loader.fadeOut(200, function () {
                            showFlash('Erreur lors du chargement (' + res.status + ') ' + error, true);
                        });
                    }
                });
            });
        })

        .on("submit", "form.delete", function (e) {
            e.preventDefault();
            currentForm = $(this);
        });

    flash.on("mouseenter", function () {
        $(this).stop().hide(0);
    });

    function showFlash(message, type) {
        flash.stop().hide(0);

        if(!type) {
            flash
                .html('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' + message)
                .removeClass('ok')
                .removeClass('ko')
                .addClass('ok');
        }
        else {
            flash
                .html('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' + message)
                .removeClass('ok')
                .removeClass('ko')
                .addClass('ko');
        }

        flash.show(0).fadeOut(3500);
    }

    if (flash.html().trim() !== '') {
        flash
            .stop()
            .hide(0)
            .show(0)
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