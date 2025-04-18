**Janji**

Saya Armelia Zahrah Mumtaz dengan NIM 2300801 berjanji mengerjakan TP7 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin



**Desain Program Toko Bunga**



Komponen Utama:
1. Database (db_flower_shop)
   
Database memiliki tiga tabel utama:

flowers: Menyimpan data tentang bunga yang dijual

suppliers: Menyimpan data pemasok bunga

orders: Menyimpan data pesanan pelanggan


2. Koneksi Database (db.php)
   
File db.php adalah komponen sentral yang menangani koneksi database dan digunakan oleh komponen-komponen lain untuk mengakses database.


3. Modul Utama
   
Terdapat tiga modul utama yang berhubungan dengan entitas dalam database:

Flowers.php: Mengelola data bunga

Suppliers.php: Mengelola data pemasok

Orders.php: Mengelola data pesanan


4. Halaman View
   
Setiap modul memiliki tiga halaman view:

list.php: Menampilkan daftar entitas

create.php: Form untuk membuat entitas baru

update.php: Form untuk memperbarui entitas yang ada


5. Struktur UI

index.php: Halaman utama aplikasi

header.php: Berisi elemen header yang konsisten di semua halaman

footer.php: Berisi elemen footer yang konsisten di semua halaman


![TP7 drawio 1](https://github.com/user-attachments/assets/fb28bf3a-9ccf-4a2a-b18b-ea3a792a6a47)


**Alur Program**


1. Alur Awal:

User mengakses aplikasi melalui index.php

index.php memuat header.php dan footer.php untuk membuat layout konsisten

index.php menyediakan navigasi ke ketiga modul utama (Flowers, Suppliers, Orders)



2. Alur Melihat Data:

User memilih salah satu modul (misalnya "View Flower")

Sistem mengarahkan ke halaman list.php modul yang bersangkutan

list.php memanggil kelas model terkait (mis. Flowers.php)

Model mengakses database melalui db.php untuk mengambil data

Data ditampilkan dalam bentuk daftar/tabel



3. Alur Menambah Data:

User klik tombol "Tambah" di halaman list.php

Sistem mengarahkan ke halaman create.php

User mengisi form dan submit

create.php memanggil kelas model terkait

Model menyimpan data ke database melalui db.php

User diarahkan kembali ke halaman list.php



4. Alur Mengubah Data:

User klik tombol "Edit" pada salah satu item di list.php

Sistem mengarahkan ke halaman update.php dengan ID item

Form diisi dengan data yang sudah ada

User melakukan perubahan dan submit

update.php memanggil kelas model terkait

Model memperbarui data di database melalui db.php

User diarahkan kembali ke halaman list.php



Hubungan Antar Komponen:

Semua kelas model (Flowers.php, Suppliers.php, Orders.php) bergantung pada db.php untuk koneksi database

Setiap View memanggil kelas model yang sesuai untuk operasi CRUD

index.php adalah titik masuk utama yang menghubungkan semua halaman View

header.php dan footer.php digunakan oleh index.php untuk konsistensi tampilan
