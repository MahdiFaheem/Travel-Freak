$("#idEmail").blur(function () {

    $.ajax({
        type: "POST",
        url: "emailAjaxForgot.php",
        data: "uemail=" + $(this).val(),
        success: function (data) {
            $("#infoEmail").html(data);
        }
    });

})