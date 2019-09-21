$("#hotelSelectCmb").change(function() {
    if ($(this).val() == "") {
        alert("Select a hotel");

        $("#doubleRate").html("0000");
        $("#singleRate").html("0000");
    } else {
        $.ajax({
            type: "POST",
            url: "hotelRateCheckSyl.php",
            data: "uHotel=" + $(this).val(),
            success: function(data) {
                var dataArr = JSON.parse(data);
                var value1 = dataArr.value_1;
                var value2 = dataArr.value_2;
                $("#singleRate").html(value1);
                $("#doubleRate").html(value2);
            }
        });
    }
});

$("#BrkCmb").change(function() {
    if ($(this).val() == "") {
        alert("Select a meal");
    }
});

$("#LunCmb").change(function() {
    if ($(this).val() == "") {
        alert("Select a meal");
    }
});

$("#DinCmb").change(function() {
    if ($(this).val() == "") {
        alert("Select a meal");
    }
});
