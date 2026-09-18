<?php
// index.php - Berfungsi sebagai Presentation Layer

// Merajut komponen menggunakan require_once (Level toleransi nol jika file tidak ada)
require_once 'products.php';
require_once 'functions.php';

// Menghitung total nilai stok menggunakan fungsi dari functions.php
$totalAset = hitungTotalNilaiStok($katalogProduk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .summary { margin-top: 20px; font-size: 18px; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Sistem Informasi Produk Gudang</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Merender data ke layout tabel HTML via perulangan foreach -->
            <?php foreach ($katalogProduk as $produk) { ?>
                
                <!-- Menyaring warna baris menggunakan fungsi conditional -->
                <tr style="<?php echo tentukanWarnaBaris($produk['stok']); ?>">
                    <td><?php echo $produk['id']; ?></td>
                    <td><?php echo $produk['nama']; ?></td>
                    <td><?php echo $produk['kategori']; ?></td>
                    <td>Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $produk['stok']; ?></td>
                    <td><?php echo $produk['deskripsi']; ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <div class="summary">
        Total Nilai Aset Gudang Saat Ini: Rp <?php echo number_format($totalAset, 0, ',', '.'); ?>
    </div>

</body>
</html>