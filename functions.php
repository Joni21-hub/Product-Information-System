<?php
// functions.php - Berfungsi sebagai Processing Layer

// Fungsi untuk mengalkulasi total nilai aset gudang
function hitungTotalNilaiStok($katalog) {
    $totalNilai = 0;
    // Menggunakan perulangan foreach untuk menavigasi array dengan aman
    foreach ($katalog as $item) {
        $totalNilai += ($item['harga'] * $item['stok']);
    }
    return $totalNilai;
}

// Fungsi dengan logika conditional untuk menentukan warna baris tabel jika stok kritis (< 3)
function tentukanWarnaBaris($stok) {
    if ($stok < 3) {
        return "background-color: #ffcccc;"; // Mengembalikan warna latar merah muda (kritis)
    } else {
        return ""; // Baris tetap normal jika stok aman
    }
}
?>