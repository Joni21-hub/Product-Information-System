<?php
// products.php - Berfungsi sebagai Data Layer

$katalogProduk = [
    [
        "id" => "PRD-001",
        "nama" => "Laptop Asus Pro",
        "kategori" => "Tech",
        "harga" => 7500000,
        "stok" => 5,
        "deskripsi" => "Laptop untuk produktivitas tinggi."
    ],
    [
        "id" => "PRD-002",
        "nama" => "Mouse Wireless",
        "kategori" => "Tech",
        "harga" => 125000,
        "stok" => 2, // Stok sengaja dibuat kritis (< 3) untuk menguji logika nanti
        "deskripsi" => "Mouse tanpa kabel dengan presisi tinggi."
    ],
    [
        "id" => "PRD-003",
        "nama" => "Kursi Ergonomis",
        "kategori" => "Home",
        "harga" => 1500000,
        "stok" => 10,
        "deskripsi" => "Kursi nyaman untuk bekerja seharian."
    ]
];
?>