document.addEventListener("DOMContentLoaded", function () {
    console.log("masuk")
    const ageApplyBtn = document.querySelector(".age-input");
    const minRange = document.querySelector(".range-min");
    const maxRange = document.querySelector(".range-max");
    const categoryLinks = document.querySelectorAll(".category-link");

    // Fungsi untuk update URL filter umur
    ageApplyBtn.addEventListener("click", function (e) {
        e.preventDefault();

        // Ambil parameter dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get("category"); // Cek apakah ada kategori sebelumnya

        // Ambil nilai slider usia
        const minAge = minRange.value;
        const maxAge = maxRange.value;

        // Buat URL baru dengan mempertahankan kategori (jika ada) dan menambahkan filter usia
        let newUrl = window.location.pathname + "?";
        if (category) {
            newUrl += `category=${category}&`; // Tetap pertahankan kategori
        }
        newUrl += `minAge=${minAge}&maxAge=${maxAge}`;

        // Redirect ke URL yang sudah diperbarui
        window.location.href = newUrl;
    });

    // Fungsi untuk update URL filter kategori
    categoryLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            // Ambil kategori dari link yang diklik
            const selectedCategory = new URL(this.href).searchParams.get(
                "category"
            );

            // Ambil nilai usia dari URL jika sudah ada
            const urlParams = new URLSearchParams(window.location.search);
            const minAge = urlParams.get("minAge");
            const maxAge = urlParams.get("maxAge");

            // Buat URL baru dengan mempertahankan filter umur
            let newUrl =
                window.location.pathname + `?category=${selectedCategory}`;
            if (minAge && maxAge) {
                newUrl += `&minAge=${minAge}&maxAge=${maxAge}`;
            }

            // Redirect ke URL yang sudah diperbarui
            window.location.href = newUrl;
        });
    });
});
