// Default data form auth user
var defaultProvince = "{{ Auth::user() ? Auth::user()->province : null }}";
var defaultCity = "{{ Auth::user() ? Auth::user()->city : null }}";
var defaultDistrict = "{{ Auth::user() ? Auth::user()->district : null }}";
var defaultVillage = "{{ Auth::user() ? Auth::user()->village : null }}";

if (defaultProvince) {
    // Load cities and then load districts based on the selected city
    onChangeSelect(
        "/cities",
        defaultProvince,
        "city",
        defaultCity,
        function () {
            // After cities are loaded, load districts
            onChangeSelect(
                "/districts",
                defaultCity,
                "district",
                defaultDistrict,
                function () {
                    // After districts are loaded, load villages
                    onChangeSelect(
                        "/villages",
                        defaultDistrict,
                        "village",
                        defaultVillage
                    );
                }
            );
        }
    );
}

function onChangeSelect(url, name, tag, selected = null, callback = null) {
    // send ajax request to get the cities of the selected province and append to the select tag
    $.ajax({
        url: url,
        type: "GET",
        data: {
            name: name,
        },
        success: function (data) {
            $("#" + tag).empty();
            $("#" + tag).append('<option value="">-- Pilih --</option>');
            $.each(data, function (key, value) {
                $("#" + tag).append(
                    '<option value="' +
                        value +
                        '"' +
                        (value == selected ? " selected" : "") +
                        ">" +
                        value +
                        "</option>"
                );
            });
            // If a callback is provided, execute it after the data is loaded
            if (callback) {
                callback();
            }
        },
    });
}

$(function () {
    $("#province").on("change", function () {
        onChangeSelect("/cities", $(this).val(), "city", null, function () {
            // Clear kecamatan and kelurahan when province changes
            $("#district").empty().append("<option>-- Pilih --</option>");
            $("#village").empty().append("<option>-- Pilih --</option>");
        });
    });

    $("#city").on("change", function () {
        onChangeSelect(
            "/districts",
            $(this).val(),
            "district",
            null,
            function () {
                // Clear kelurahan when city changes
                $("#village").empty().append("<option>-- Pilih --</option>");
            }
        );
    });

    $("#district").on("change", function () {
        console.log('asdsa')
        onChangeSelect("/villages", $(this).val(), "village");
    });

    $("#village").on("change", function () {
        console.log("chek");
        $.ajax({
            url: url,
            type: "GET",
            data: {
                province: $("#province").val(),
                city: $("#city").val(),
                district: $("#district").val(),
                village: $("#village").val(),
            },
            success: function (response) {
                if (response.success) {
                    console.log(response.message);
                    console.log(response.price);
                    console.log(response.courier);
                    $("#shipping_rate").text(response.price);
                } else {
                    console.log(response.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
            },
        });
    });
});
