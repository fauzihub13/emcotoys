document.addEventListener("DOMContentLoaded", function () {
    $("#plus-counter").click(function () {
        const currentValue = parseInt($("#quantity").val());
        $("#quantity").val(currentValue + 1);
        // console.log("plus");
    });

    $("#minus-counter").click(function () {
        const currentValue = parseInt($("#quantity").val());
        if (currentValue > 1) {
            $("#quantity").val(currentValue - 1);
            // console.log("minus");
        }
    });
});
