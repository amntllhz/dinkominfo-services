document.addEventListener("DOMContentLoaded", () => {
  const copyButton = document.querySelector("#copy-button");
  const resiText = document.querySelector("#resi-text");
  const copyIcon = document.querySelector("#copy-icon");
  const checkedIcon = document.querySelector("#checked-icon");

  copyButton.addEventListener("click", (event) => {
    event.preventDefault(); // Mencegah perilaku default anchor tag

    navigator.clipboard
      .writeText(resiText.textContent)
      .then(() => {
        // Ganti ikon setelah salin berhasil
        copyIcon.style.display = 'none';
        checkedIcon.style.display = 'block';

        // Kembalikan ikon setelah 2 detik
        setTimeout(() => {
          copyIcon.style.display = 'block';
          checkedIcon.style.display = 'none';
        }, 5000);
      })
      .catch((err) => {
        console.error("Gagal menyalin: ", err);
      });
  });
});
