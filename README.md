# Tugas Mini Project: Product Information System

Mata Kuliah: Pemrograman Web (Pertemuan 2)

## 1. Arsitektur Konseptual
Sistem ini memecah struktur file berdasarkan prinsip *Separation of Concerns*:
- `products.php` (Data Layer): Menyimpan koleksi multidimensional array komoditas produk.
- `functions.php` (Processing Layer): Menyimpan fungsi kalkulasi nilai aset dan logika penanda stok kritis.
- `index.php` (Presentation Layer): Merajut komponen dengan `require_once` dan merender tabel antarmuka HTML.

---

## 2. Jawaban Evaluasi & Diskusi Kelas

**Pertanyaan 1: Mengapa associative array dinilai jauh lebih representatif dan aman untuk memetakan spesifikasi detail atribut produk dibanding menggunakan indexed array?**

**Jawaban:**
* **Representatif (Makna Semantik):** *Associative array* menggunakan kunci (*key*) berbasis *string* yang memiliki makna langsung (seperti `'nama'`, `'harga'`). Hal ini membuat kode bersifat *self-documenting*. Pemanggilan `$produk['harga']` langsung terbaca jelas maksudnya dibandingkan menebak isi indeks pada *indexed array* seperti `$produk[3]`.
* **Aman (Stabilitas Struktur Data):** *Associative array* kebal terhadap pergeseran struktur. Jika ada penambahan atribut baru di tengah susunan *array*, pemanggilan nilai `'harga'` tidak akan rusak karena dipanggil berdasarkan label namanya. Sebaliknya pada *indexed array*, penambahan elemen baru akan menggeser seluruh urutan nomor indeks di belakangnya dan berisiko memunculkan galat logika (*logic error*).

**Pertanyaan 2: Berikan analisis konsekuensi fatal yang terjadi jika seorang developer ceroboh menggunakan include dibandingkan require untuk memuat file database connection vendor!**
(Jawaban menyusul)

**Pertanyaan 3: Mengapa penanganan galat logika (logic error) memakan durasi pencarian yang jauh lebih lama dan sulit dideteksi dibandingkan dengan kesalahan sintaksis (syntax error)?**
(Jawaban menyusul)

**Pertanyaan 4: Tinjau dari sudut pandang optimasi memori: Apa bahaya struktural jangka panjang jika arsitektur database direplikasi ke dalam multidimensional array yang tingkat bersarangnya (nesting) terlalu dalam?**
(Jawaban menyusul)