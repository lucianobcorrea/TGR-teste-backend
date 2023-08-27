$(document).ready(function () {
    $("#produto-form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: "POST",
            url: "cadastrar",
            data: formData,
            success: function (response) {
                window.location.href = "/";
            },
            error: function (error) {
                $("#errors").empty();

                var errors = error.responseJSON.errors;
                $.each(errors, function (key, value) {
                    $("#errors").append("<p>" + value + "</p>");
                });
            },
        });
    });
});
