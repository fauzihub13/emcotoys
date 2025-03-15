document.addEventListener("DOMContentLoaded", function () {
    $(".plus-counter").click(function (e) {
        e.preventDefault();

        var id = $(this).data("id");
        var csrfToken = $("input[name='_token']").val();
        var quantityElement = $("#quantity-" + id);
        var totalPrice = $("#total_price");
        var currentValue = parseInt(quantityElement.text().trim(), 10);

        if (!isNaN(currentValue)) {
            $.ajax({
                url: "/cart/" + id + "/increment",
                type: "POST",
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    if (response.success) {
                        quantityElement.text(currentValue + 1);
                        let formattedPrice = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        })
                            .format(response.total_price)
                            .replace(/\s/g, "");

                        totalPrice.text(formattedPrice);
                    } else {
                        quantityElement.text(currentValue);
                    }
                },
                error: function (xhr) {
                    quantityElement.text(currentValue);
                },
            });
        }
    });

    $(".minus-counter").click(function (e) {
        e.preventDefault();

        var id = $(this).data("id");
        var csrfToken = $("input[name='_token']").val();
        var quantityElement = $("#quantity-" + id);
        var totalPrice = $("#total_price");
        var currentValue = parseInt(quantityElement.text().trim(), 10);

        if (!isNaN(currentValue) && currentValue > 1) {
            $.ajax({
                url: "/cart/" + id + "/decrement",
                type: "POST",
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    if (response.success) {
                        quantityElement.text(currentValue - 1);
                        let formattedPrice = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        })
                            .format(response.total_price)
                            .replace(/\s/g, "");

                        totalPrice.text(formattedPrice);
                    } else {
                        quantityElement.text(currentValue);
                    }
                },
                error: function (xhr) {
                    quantityElement.text(currentValue);
                },
            });
        }
    });

    $(".confirm-delete").click(function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-cart-form").action =
                    "/cart/" + id;
                document.getElementById("delete-cart-form").submit();
            }
        });
    });
});
