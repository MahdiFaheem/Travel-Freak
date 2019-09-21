$("#idEmail").keyup(function () {

    $.ajax({
        type: "POST",
        url: "emailAjax.php",
        data: "uemail=" + $(this).val(),
        success: function (data) {
            $("#infoEmail").html(data);
        }
    });

})