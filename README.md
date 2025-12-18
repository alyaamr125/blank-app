# LAPORAN KEMAJUAN - APLIKASI PEMINJAMAN LAPTOP
ALYAA MAHIRAAH | II RKS A | 2423101997

### 1. Deskripsi
Website aplikasi peminjaman dan pengembalian laptop taruna adalah sistem manajemen digital terintegrasi yang dirancang khusus untuk mempermudah proses peminjaman dan pengembalian laptop bagi taruna di sekolah kedinasan, dengan fitur-fitur seperti pendataan inventaris real-time, pelacakan status laptop, pengajuan peminjaman online, pelaporan kerusakan, serta monitoring riwayat pemakaian guna memastikan transparansi, akuntabilitas, dan efisiensi dalam pengelolaan aset teknologi akademi.

### 2. Kisah Pengguna
Sebagai pengguna, saya dapat:
1. Menggunakan Akses Peminjaman Laptop dengan Proses Digital dan mudah
2. Memantau Status dan Ketersediaan Laptop Secara Real-Time
3. Mengurangi Risiko Keterlambatan Pengembalian dan Sanksi
4. Melaporkan Kerusakan atau Masalah Teknis Secara Terstruktur

### 3. SRS (Spesifikasi Persyaratan Perangkat Lunak)
1. Manajemen Pengguna & Autentikasi
   - Login Multi-Role (Taruna, Admin, Supervisor)
   - Registrasi Otomatis berdasarkan data taruna terpusat
   - Profil Pengguna dengan data pribadi dan riwayat peminjaman
   - Manajemen Session & Keamanan (timeout, log aktivitas)
2. Proses Peminjaman
   - Pencarian & Filtering laptop tersedia
   - Form Pengajuan Online dengan tujuan peminjaman
   - Validasi Kuota peminjaman per taruna
   - Persetujuan Bertahap (otomatis/manual)
3. Proses Pengembalian
   - Form Pengembalian dengan kondisi laptop
   - Riwayat waktu pengembalian
4. Riwayat & Monitoring
   - Dashboard Personal taruna
   - Riwayat Peminjaman dan pengembalian lengkap
   - Status Saat Ini laptop dipinjam
  
### 4. Diagram UML

      %% graph LR
    %% Aktor (User) dilambangkan dengan lingkaran ganda
    User((User))

    %% Kotak Sistem Aplikasi
    subgraph Aplikasi [Aplikasi Borrow My Laptop]
        direction TB
        UC1(Lihat Dashboard)
        UC2(Peminjaman)
        UC3(Pengembalian)
        UC4(Laptop Dipinjam)
        UC5(Riwayat)
    end

    %% Garis Hubung
    User --> UC1
    User --> UC2
    User --> UC3
    User --> UC4
    User --> UC5


### 5. Maket
Tampilan antarmuka (UI) pada aplikasi Borrow My Laptop
1. Tampilan Input Data Peminjaman
<img width="1602" height="794" alt="image" src="https://github.com/user-attachments/assets/6fe778e1-4378-4841-80db-883e34c95a78" />

2. Tampilan Pengembalian
<img width="1606" height="800" alt="image" src="https://github.com/user-attachments/assets/9912f504-0c74-47c0-854c-efba6f82d964" />

3. Tampilan Laptop Dipinjam
<img width="1607" height="800" alt="image" src="https://github.com/user-attachments/assets/1e6deb91-99ed-4a5f-926b-f289dbbbb39a" />

4. Tampilan Riwayat Peminjaman Laptop
<img width="1613" height="792" alt="image" src="https://github.com/user-attachments/assets/7184e7f8-6c35-4307-860c-d847043b042b" />
