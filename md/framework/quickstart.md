# Quick Start

## Membuat halaman
Untuk memulai membuat halaman, buat file **.php** dan **.tpl** dalam folder `mods`. Contoh `mods/home.php` dan `mods/home.tpl`.

**home.php**
```
<?php
$_title = "HOME";

$smarty->assign("username", "John");

```

**home.tpl**
```
<h1>{$_title}</h1>
<p>Halo, {$username}</p>
<br>
<a href="?p=home">Link to home</a>
```

Untuk melihat hasilnya akses URL https://alamat_website/?p=home