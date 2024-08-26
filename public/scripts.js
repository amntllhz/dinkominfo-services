document.addEventListener("DOMContentLoaded", () => {
    const copyButton = document.querySelector("#copy-button");
    const resiText = document.querySelector("#resi-text");
    const copyIcon = document.querySelector("#copy-icon");
    const checkedIcon = document.querySelector("#checked-icon");

    // tooltip
    tippy("#copy-button", {
        size: "small",
        content: "Copied!",
        trigger: "click",
        placement: "right",
        animation: "fade", // Optional, you can use other animations
        delay: [0, 1000], // Tooltip will hide after 2 seconds
        hideOnClick: true, // Tooltip hides on clicking anywhere
    });

    copyButton.addEventListener("click", (event) => {
        event.preventDefault(); // Mencegah perilaku default anchor tag

        navigator.clipboard
            .writeText(resiText.textContent)
            .then(() => {
                // Ganti ikon setelah salin berhasil
                copyIcon.style.display = "none";
                checkedIcon.style.display = "block";

                // Kembalikan ikon setelah 2 detik
                setTimeout(() => {
                    copyIcon.style.display = "block";
                    checkedIcon.style.display = "none";
                }, 5000);
            })
            .catch((err) => {
                console.error("Gagal menyalin: ", err);
            });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.getElementById("hamburger");
    const mobileMenu = document.getElementById("mobile-menu");
    const tabMenu = document.getElementById("tab-menu");
    const closeMenuA = document.getElementById("close-menu-a");
    const closeMenuB = document.getElementById("close-menu-b");

    // Tampilkan menu mobile saat tombol hamburger ditekan
    hamburger.addEventListener("click", () => {
        mobileMenu.classList.remove("hidden");
        mobileMenu.classList.add("block"); // Menambahkan kelas block untuk menampilkan menu
    });

    // Sembunyikan menu mobile saat tombol close ditekan
    closeMenuA.addEventListener("click", () => {
        mobileMenu.classList.add("hidden");
        mobileMenu.classList.remove("block"); // Menghapus kelas block untuk menyembunyikan menu
    });

    // Sembunyikan menu mobile saat klik di luar menu
    document.addEventListener("click", (event) => {
        if (
            !mobileMenu.contains(event.target) &&
            !hamburger.contains(event.target)
        ) {
            mobileMenu.classList.add("hidden");
            mobileMenu.classList.remove("block"); // Menghapus kelas block untuk menyembunyikan menu
        }
    });

    // Tampilkan menu mobile saat tombol hamburger ditekan
    hamburger.addEventListener("click", () => {
        tabMenu.classList.remove("hidden");
        tabMenu.classList.add("block"); // Menambahkan kelas block untuk menampilkan menu
    });

    // Sembunyikan menu mobile saat tombol close ditekan
    closeMenuB.addEventListener("click", () => {
        tabMenu.classList.add("hidden");
        tabMenu.classList.remove("block"); // Menghapus kelas block untuk menyembunyikan menu
    });

    // Sembunyikan menu mobile saat klik di luar menu
    document.addEventListener("click", (event) => {
        if (
            !tabMenu.contains(event.target) &&
            !hamburger.contains(event.target)
        ) {
            tabMenu.classList.add("hidden");
            tabMenu.classList.remove("block"); // Menghapus kelas block untuk menyembunyikan menu
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const instansiSelect = document.getElementById("instansi");
    const newInstansiForm = document.getElementById("newInstansiForm");
    const newInstansiName = document.getElementById("newInstansiName");
    const newInstansiAddress = document.getElementById("newInstansiAddress");
    const addNewInstansiButton = document.getElementById("addNewInstansi");

    instansiSelect.addEventListener("change", function () {
        if (this.value === "other") {
            newInstansiForm.classList.remove("hidden");
        } else {
            newInstansiForm.classList.add("hidden");
        }
    });

    addNewInstansiButton.addEventListener("click", function () {
        if (newInstansiName.value && newInstansiAddress.value) {
            fetch("/instansi", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({
                    name: newInstansiName.value,
                    address: newInstansiAddress.value,
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Buat opsi baru
                    const newOption = new Option(data.name, data.id);

                    // Dapatkan indeks opsi "Lainnya"
                    const otherOptionIndex = Array.from(
                        instansiSelect.options
                    ).findIndex((option) => option.value === "other");

                    // Masukkan opsi baru tepat sebelum opsi "Lainnya"
                    instansiSelect.add(
                        newOption,
                        instansiSelect.options[otherOptionIndex]
                    );

                    // Pilih opsi baru
                    instansiSelect.value = data.id;

                    // Sembunyikan form
                    newInstansiForm.classList.add("hidden");

                    // Reset form fields
                    newInstansiName.value = "";
                    newInstansiAddress.value = "";
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat menambahkan instansi baru.");
                });
        } else {
            alert("Harap isi nama dan alamat instansi baru.");
        }
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     const instansiSelect = document.getElementById("instansi");
//     const newInstansiForm = document.getElementById("newInstansiForm");
//     const newInstansiName = document.getElementById("newInstansiName");
//     const newInstansiAddress = document.getElementById("newInstansiAddress");
//     const addNewInstansiButton = document.getElementById("addNewInstansi");

//     instansiSelect.addEventListener("change", function () {
//         if (this.value === "other") {
//             newInstansiForm.classList.remove("hidden");
//         } else {
//             newInstansiForm.classList.add("hidden");
//         }
//     });

//     addNewInstansiButton.addEventListener("click", function () {
//         if (newInstansiName.value && newInstansiAddress.value) {
//             fetch("/instansi", {
//                 method: "POST",
//                 headers: {
//                     "Content-Type": "application/json",
//                     "X-CSRF-TOKEN": document
//                         .querySelector('meta[name="csrf-token"]')
//                         .getAttribute("content"),
//                 },
//                 body: JSON.stringify({
//                     name: newInstansiName.value,
//                     address: newInstansiAddress.value,
//                 }),
//             })
//                 .then((response) => response.json())
//                 .then((data) => {
//                     // Buat opsi baru
//                     const newOption = new Option(data.name, data.id);

//                     // Dapatkan indeks opsi "Lainnya"
//                     const otherOptionIndex = Array.from(
//                         instansiSelect.options
//                     ).findIndex((option) => option.value === "other");

//                     // Masukkan opsi baru tepat sebelum opsi "Lainnya"
//                     instansiSelect.add(
//                         newOption,
//                         instansiSelect.options[otherOptionIndex]
//                     );

//                     // Pilih opsi baru
//                     instansiSelect.value = data.id;

//                     // Sembunyikan form
//                     newInstansiForm.classList.add("hidden");

//                     // Reset form fields
//                     newInstansiName.value = "";
//                     newInstansiAddress.value = "";
//                 })
//                 .catch((error) => {
//                     console.error("Error:", error);
//                     alert("Terjadi kesalahan saat menambahkan instansi baru.");
//                 });
//         } else {
//             alert("Harap isi nama dan alamat instansi baru.");
//         }
//     });
// });
