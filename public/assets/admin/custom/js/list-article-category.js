$(".confirm-delete").click(function () {
    var id = $(this).data("id");
    Swal.fire({
        title: "Are you sure you want to delete this?",
        text: "This action cannot be undone. Please confirm your decision.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-article-category-form").action =
                "/article/category/" + id;
            document.getElementById("delete-article-category-form").submit();
        } else {
            swal.fire("Your data is safe.");
        }
    });
});
