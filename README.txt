PANDUAN MENJALANKAN PROYEK PHP DI VS CODE

Kebutuhan:
- XAMPP (Apache dan MySQL)
- Visual Studio Code
- Browser

Langkah:
1. Ekstrak folder proyek_php_vscode.
2. Salin folder tersebut ke C:\xampp\htdocs\
3. Buka folder proyek_php_vscode melalui VS Code.
4. Jalankan XAMPP, lalu klik Start pada Apache dan MySQL.
5. Buka http://localhost/phpmyadmin
6. Pilih tab Import, pilih file database.sql dari folder proyek, lalu klik Go.
   Alternatif: buka tab SQL dan jalankan isi database.sql.
7. Pastikan pengaturan host, nama database, username, dan password di koneksi.php sesuai konfigurasi MySQL Anda.
   Default XAMPP biasanya username root dan password kosong.
8. Buka http://localhost/proyek_php_vscode/

Isi proyek:
- kalkulator.php       : menerima dua angka dan operator; mencegah pembagian dengan nol.
- mahasiswa_array.php  : menampilkan array 5 mahasiswa dan menghitung rata-rata nilai.
- fungsi_nilai.php     : fungsi konversiNilai(int $nilai): string.
- konversi_nilai.php   : form untuk menguji fungsi konversi nilai.
- tambah_mahasiswa.php: form tambah data dan daftar mahasiswa menggunakan PDO prepared statement.
- koneksi.php          : koneksi PDO ke MySQL.
- database.sql         : membuat database db_kampus dan tabel mahasiswa.

Catatan:
Jika memakai PHP built-in server, jalankan dari terminal VS Code:
php -S localhost:8000
Lalu buka http://localhost:8000
Untuk fitur mahasiswa PDO, MySQL tetap harus aktif.
