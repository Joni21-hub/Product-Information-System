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

**Jawaban:**
* **Konsekuensi Fatal (`include`):** Menggunakan `include` untuk *file* yang krusial (*core engine*) seperti koneksi *database* akan berakibat sangat fatal bagi keamanan dan stabilitas sistem. Jika *file* koneksi gagal dimuat (misalnya hilang atau rusak), perintah `include` hanya akan memicu *warning* (peringatan), namun tetap memaksa eksekusi baris kode berikutnya di bawahnya untuk terus berjalan. Akibatnya, seluruh sistem yang membutuhkan interaksi *database* (seperti proses simpan data pengguna) akan gagal memproses, berisiko mengekspos variabel internal ke publik, hingga mengakibatkan kerusakan (*corrupt*) pada antarmuka.
* **Toleransi Nol (`require`):** Seharusnya menggunakan `require`, karena memiliki toleransi nol; jika *file* penting gagal dimuat, ia akan memicu *fatal error* dan langsung menghentikan paksa seluruh eksekusi sistem saat itu juga demi keamanan.

**Pertanyaan 3: Mengapa penanganan galat logika (logic error) memakan durasi pencarian yang jauh lebih lama dan sulit dideteksi dibandingkan dengan kesalahan sintaksis (syntax error)?**

**Jawaban:**
* **Deteksi Otomatis (*Syntax Error*):** Kesalahan sintaksis (*syntax error*) sangat mudah dilacak karena disebabkan oleh pelanggaran aturan ketik bahasa pemrograman (misalnya kurang titik koma). *Interpreter* PHP akan langsung memberikan pesan kesalahan (*fatal error*), menghentikan aplikasi, dan menunjukkan koordinat baris persis di mana letak kerusakan terjadi secara spesifik.
* **Pelacakan Manual (*Logic Error*):** Sebaliknya, galat logika (*logic error*) adalah kesalahan pada alur berpikir manusia. Aplikasi tidak akan terhenti dan tidak ada pesan peringatan sama sekali, tetapi hasil kalkulasi datanya menjadi salah/cacat. *Developer* terpaksa harus melacak masalah ini secara manual melalui proses inspeksi data di tengah jalan (*State Inspection*) menggunakan fungsi seperti `var_dump()` atau `print_r()`, baris demi baris, yang memakan waktu jauh lebih lama.

**Pertanyaan 4: Tinjau dari sudut pandang optimasi memori: Apa bahaya struktural jangka panjang jika arsitektur database direplikasi ke dalam multidimensional array yang tingkat bersarangnya (nesting) terlalu dalam?**

**Jawaban:**
* **Konsumsi Memori Eksponensial:** Mereplikasi struktur *database* ke dalam *multidimensional array* dengan tingkat bersarang yang terlalu dalam akan memicu dua bahaya struktural yang parah. Pertama, konsumsi memori eksponensial; PHP harus memuat seluruh cabang struktur *array* tersebut secara utuh ke dalam RAM pada saat (*runtime*), yang dapat menyebabkan aplikasi kehabisan memori atau menjadi sangat lambat (penurunan performa drastis).
* **Kompleksitas Navigasi Iterasi:** Kedua, kompleksitas navigasi iterasi; proses *traversal* data (misalnya dengan iterasi *looping*) harus menggunakan banyak `foreach` bersarang. Hal ini tidak hanya memperbesar ruang memori yang terpakai, tetapi juga membuat kode semakin sulit dikelola (*unmaintainable*) jika terjadi kebutuhan perombakan struktur data di masa depan.