# Template Halaman

## Halaman Standar

**.php**
```
<?php
/*
filename.php
    deskripsi
*/
// includes & require

// get paramters

// inisialisasi
$_title = "Judul Halaman";

// PROGRAM UTAMA

//=============================

// assign template variables
$smarty->assign("var1", "foo");
```

**.tpl**
```
<h2>{$_title}</h2>

```