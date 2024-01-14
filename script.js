// script.js
document.addEventListener("DOMContentLoaded", function() {
    // Menyembunyikan pesan setelah 3 detik
    setTimeout(function() {
        document.querySelectorAll('.message').forEach(function(element) {
            element.style.display = 'none';
        });
    }, 3000);

    // Tambahkan logika JavaScript kustom Anda di sini
});