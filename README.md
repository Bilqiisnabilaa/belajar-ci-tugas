# 🛒 Toko Online - CodeIgniter 4
Proyek ini adalah aplikasi toko online sederhana berbasis [CodeIgniter 4](https://codeigniter.com/) yang mendukung manajemen produk, keranjang belanja, diskon harian, checkout transaksi, ongkos kirim, dan histori pembelian pengguna. Dilengkapi sistem autentikasi dan antarmuka admin menggunakan template NiceAdmin.

---

## 📚 Daftar Isi
- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)
- [Penggunaan](#penggunaan)
- [Konfigurasi](#konfigurasi)
- [Lisensi](#lisensi)
- [Kontribusi](#kontribusi)
- [Dukungan](#dukungan)

---

## ✅ Fitur

### 👤 Autentikasi
- Login pengguna berdasarkan username dan password
- Session login berdasarkan role (admin/user)

### 📦 Produk
- Lihat daftar produk (gambar, harga, stok)
- Admin dapat menambah, mengedit, menghapus produk
- Upload gambar produk
- Export data produk ke PDF

### 🗂 Kategori Produk
- Admin dapat mengelola kategori produk

### 🛍 Keranjang Belanja
- Tambah/hapus/update produk ke keranjang
- Hitung total harga otomatis
- Diskon harian otomatis dipotong dari harga produk

### 🎁 Diskon Harian
- Diskon disimpan dalam tabel diskon berdasarkan tanggal
- Saat user belanja, diskon hari ini otomatis diterapkan
- Diskon juga dicatat saat menyimpan transaksi

### 🚚 Ongkos Kirim (RajaOngkir API)
- Menampilkan lokasi tujuan dan menghitung ongkir otomatis
- Menggunakan GuzzleHttp client
- API Key disimpan di file .env

### 🧾 Transaksi
- Proses checkout belanja
- Menyimpan data pembelian dan detail transaksi
- Menyimpan ongkir dan alamat pengiriman
- Menampilkan histori transaksi user

### 📊 Dashboard
- Tampilkan total jumlah transaksi
- Tampilkan jumlah item per transaksi

---

## 🖥 Persyaratan Sistem
- PHP >= 8.2
- Composer
- XAMPP / Apache + MySQL
- GuzzleHttp (via composer)
- CodeIgniter 4

---

## ⚙ Instalasi

1. **Clone repository ini**
   ```bash
   git clone [URL repository]
   cd toko-online-ci4
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp env .env
   ```

4. **Konfigurasi database**
   - Buat database baru di MySQL
   - Atur konfigurasi database di file `.env`:
   ```
   database.default.hostname = localhost
   database.default.database = toko_online_db
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

5. **Setup RajaOngkir API**
   - Dapatkan API key dari [RajaOngkir](https://rajaongkir.com/)
   - Tambahkan ke file `.env`:
   ```
   RAJAONGKIR_API_KEY = api_key_anda_disini
   ```

6. **Jalankan migrasi database**
   ```bash
   php spark migrate
   ```

7. **Jalankan seeder database**
   ```bash
   php spark db:seed
   ```

8. **Jalankan aplikasi**
   ```bash
   php spark serve
   ```

---

## 🏗 Struktur Proyek

```
belajar-ci/
├── app/
│   ├── Config/                → Konfigurasi dasar: routing, database, dll
│   ├── Controllers/           → Logika utama aplikasi (controller)
│   │   ├── ApiController.php              → Menyediakan endpoint untuk API
│   │   ├── AuthController.php             → Autentikasi pengguna (login/logout)
│   │   ├── BaseController.php             → Kelas dasar untuk semua controller
│   │   ├── ContactController.php          → Menampilkan halaman kontak
│   │   ├── DiskonController.php           → Kelola diskon per tanggal
│   │   ├── FaqController.php              → Menampilkan halaman FAQ
│   │   ├── Home.php                       → Halaman utama dan profil pengguna
│   │   ├── ProdukCategoryController.php   → Kelola kategori produk
│   │   ├── ProdukController.php           → CRUD data produk dan PDF export
│   │   └── TransaksiController.php        → Keranjang, checkout, transaksi
│   ├── Models/                → Model untuk mengakses database
│   │   ├── ProductModel.php
│   │   ├── DiskonModel.php
│   │   ├── UserModel.php
│   │   ├── CategoryModel.php
│   │   ├── TransactionModel.php
│   │   └── TransactionDetailModel.php
│   ├── Views/                 → File tampilan UI (HTML + PHP)
│   │   ├── v_produk.php           → Halaman produk
│   │   ├── v_diskon.php           → Halaman diskon
│   │   ├── v_keranjang.php        → Halaman keranjang
│   │   ├── v_checkout.php         → Halaman checkout
│   │   ├── v_profile.php          → Halaman riwayat transaksi user
│   │   ├── v_login.php            → Halaman login
│   │   ├── v_produkPDF.php        → Tampilan PDF produk
│   │   ├── v_produkCategory.php   → Kategori produk
│   │   ├── layout.php             → Layout utama
│   │   └── components/            → Header, Sidebar, Footer
│   │       ├── header.php
│   │       ├── sidebar.php
│   │       └── footer.php
│   ├── Database/
│   │   ├── Migrations/        → Struktur tabel database (Product, User, Transaksi, dst)
│   │   │   ├── 2025-05-22-061658_User.php
│   │   │   ├── 2025-05-22-061710_Product.php
│   │   │   ├── 2025-05-22-061719_Transaction.php
│   │   │   ├── 2025-05-22-061726_TransactionDetail.php
│   │   │   ├── 2025-05-29-124220_ProductCategory.php
│   │   │   └── 2025-07-01-032242_Diskon.php
│   │   └── Seeds/             → Seeder untuk data awal
│   │       ├── ProductSeeder.php
│   │       ├── UserSeeder.php
│   │       ├── DiskonSeeder.php
│   │       └── ProductCategorySeeder.php
│   ├── Filters/              → Filter akses seperti login (Auth.php, Redirect.php)
│   ├── Helpers/, Language/, Libraries/ → Folder bawaan CI4
│   └── ThirdParty/           → Bisa diisi library tambahan
├── public/
│   ├── index.php             → Entry point aplikasi
│   ├── img/                  → Folder upload gambar produk
│   ├── NiceAdmin/            → Asset UI dari template NiceAdmin (css, js, plugins)
│   └── dashboard-toko/       → File tambahan dashboard admin
├── writable/                 → Cache, logs, dan upload lainnya
├── vendor/                   → Dependency dari composer
├── .env                      → Konfigurasi lingkungan (API key, DB, dll)
├── composer.json             → Konfigurasi package PHP
├── spark                     → CLI bawaan CodeIgniter
└── README.md                 → Dokumentasi proyek ini
```

---

## 🚀 Penggunaan

### Akses Admin
- URL: `/admin`
- Kredensial default:
  - Username: `admin`
  - Password: `admin123`

### Fitur Pengguna
- Jelajahi produk berdasarkan kategori
- Tambahkan produk ke keranjang
- Terapkan diskon harian otomatis
- Hitung ongkos kirim
- Selesaikan proses checkout
- Lihat riwayat pembelian

### Fitur Admin
- Kelola produk dan kategori
- Atur diskon harian
- Lihat laporan transaksi
- Export data ke PDF
- Manajemen pengguna

---

## 🔧 Konfigurasi

### Tabel Database
- `users` - Data autentikasi pengguna
- `categories` - Kategori produk
- `products` - Informasi produk
- `carts` - Item keranjang belanja
- `discounts` - Pengaturan diskon harian
- `transactions` - Header transaksi
- `transaction_details` - Detail item transaksi

### Integrasi API
- **RajaOngkir**: Untuk perhitungan ongkos kirim
- **Export PDF**: Menggunakan library bawaan CodeIgniter

### File Penting
- **Controllers**: Menangani logika bisnis dan permintaan pengguna
- **Models**: Mengelola operasi database
- **Views**: Menampilkan data kepada pengguna
- **Migrations**: Mendefinisikan struktur database
- **Seeds**: Mengisi data awal

---

## 🚀 Deploy ke GitHub

1. *Inisialisasi Git di folder proyek* (jika belum)
   bash
   git init
   

2. *Tambahkan semua file ke staging*
   bash
   git add .
   

3. *Commit perubahan awal*
   bash
   git commit -m "Inisialisasi proyek toko online CI4"
   

4. *Hubungkan ke repository GitHub*  
   Buat repository di GitHub terlebih dahulu (misal: https://github.com/username/toko-ci4)
   bash
   git remote add origin https://github.com/username/toko-ci4.git
   

5. *Push ke GitHub*
   bash
   git branch -M main
   git push -u origin main
   

---

## 📝 Lisensi
Proyek ini bersifat open source dan tersedia di bawah [MIT License](LICENSE).

---

## 🤝 Kontribusi
Kontribusi sangat diterima! Silakan ajukan Pull Request.

---

## 📞 Dukungan
Jika memiliki pertanyaan atau masalah, silakan buat issue di repository ini.