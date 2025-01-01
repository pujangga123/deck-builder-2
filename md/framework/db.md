# Redlist2: Koneksi Database

Berikut beberapa cara cepat menggunakan ADOdb untuk eksekusi query. Untuk ini, Anda bisa menggunakan objek global `$db`.

Inisialisasi `$db` dan konfirgurasi dilakukan dalam file `initdb.php` dan `config.php`

Gunakan `GetAll()` untuk mengambil data dan menyimpannya dalam array. Array menggunakan index `0-...`
```
$sql = "SELECT * FROM lokasi LIMIT 10";
$data = $db->GetAll($sql);
```

Gunakan `GetAssoc()` untuk mengambil data dan menyimpannya dalam array. Array menggunakan kolom pertama sebagai index untuk menggunakan `GetAssoc()`, pastikan kolom pertama pada query adalah key yang bersifat unik
```
$sql = "SELECT * FROM lokasi LIMIT 10";
$data = $db->GetAssoc($sql);
```

Gunakan `GetRow()` untuk mengambil satu baris data dalam bentuk associative array. Array menggunakan nama kolom sebagai index
```
$sql = "SELECT * FROM lokasi WHERE id='BDG'";
$data = $db->GetRow($sql);
```

Gunakan `Execute()` untuk mengeksekusi perintah manipulasi data (`INSERT`, `UPDATE`, `DELETE`).

```
$sql = "UPDATE act SET number=0"
$db->Execute($sql);
```

Gunakan `Execute()` dan `fetchRow()` untuk membaca data secara manual. Fungsi `recordCount()` bisa digunakan untuk menghitung jumlah record yang dibaca lewat `Execute()`.
```
$sql = "SELECT * FROM act"
$result = $db->Execute($sql);
$recordCount = $result->recordCount(); // menghitung jumlah record
while($r = $result->fetchRow())
    print_r($r);
```

