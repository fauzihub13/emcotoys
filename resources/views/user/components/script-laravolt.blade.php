<script>
    // Default data form auth user
    var defaultProvince = "{{ Auth::user() ? Auth::user()->province : null }}";
    var defaultCity = "{{ Auth::user() ? Auth::user()->city : null }}";
    var defaultDistrict = "{{ Auth::user() ? Auth::user()->district : null }}";
    var defaultVillage = "{{ Auth::user() ? Auth::user()->village : null }}";
    var rawPrice = parseInt($("#raw_price").val()) || 0;

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
        $("#btn-checkout")
            .text("Please wait...")
            .attr("type", "button")
            .prop("disabled", true);
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: "GET",
            data: {
                name: name,
            },
            success: function (data) {
                $("#" + tag).empty();
                $("#" + tag).append('<option value="">-- Select one --</option>');
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
                $("#district").empty().append("<option>-- Select one --</option>");
                $("#village").empty().append("<option>-- Select one --</option>");
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
                    $("#village").empty().append("<option>-- Select one --</option>");
                }
            );
        });

        $("#district").on("change", function () {
            onChangeSelect("/villages", $(this).val(), "village");
        });

        $("#village").on("change", function (e) {
            $("#btn-checkout")
                .text("Please wait...")
                .attr("type", "button")
                .prop("disabled", true);
            var csrfToken = $("input[name='_token']").val();


            $.ajax({
                url: '/cart/shipping-rate',
                type: "POST",
                data: {
                    _token: csrfToken,
                    name: $("#name").val(),
                    phone_number: $("#phone_number").val(),
                    province: $("#province").val(),
                    city: $("#city").val(),
                    district: $("#district").val(),
                    village: $("#village").val(),
                },
                success: function (response) {
                    if (response.status) {

                        let formattedPrice = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        })
                            .format(response.price)
                            .replace(/\s/g, "");

                        $("#shipping_rate").text(formattedPrice);

                        let total = rawPrice + response.price;

                        let formattedTotal = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        })
                            .format(total)
                            .replace(/\s/g, "");

                        $('#total_price').text(formattedTotal);

                        $("#btn-checkout")
                            .text("Checkout")
                            .attr("type", "submit")
                            .prop("disabled", false);

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

</script>
