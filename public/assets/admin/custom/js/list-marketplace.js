$(".confirm-delete").click(function () {
    var id = $(this).data("id");
    Swal.fire({
        title: "Are you sure you want to delete this?",
        text: "This action cannot be undone. Deleting this will also remove all related data permanently. Please confirm your decision.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-marketplace-form").action =
                "/marketplace/" + id;
            document.getElementById("delete-marketplace-form").submit();
        } else {
            swal.fire("Your data is safe.");
        }
    });
});
