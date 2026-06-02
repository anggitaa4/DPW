<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<nav class="navbar">
    <a href="index.php" class="brand">Sistem Info Kampus</a>

    <div class="nav-links">

        <a href="viewdosen.php"
           <?= in_array($current, ['viewdosen.php','input.php','editdosen.php']) ? 'class="active"' : '' ?>>
            Dosen
        </a>

        <a href="viewmahasiswa.php"
           <?= in_array($current, ['viewmahasiswa.php','inputmahasiswa.php','editmahasiswa.php']) ? 'class="active"' : '' ?>>
            Mahasiswa
        </a>

        <a href="viewmatakuliah.php"
           <?= in_array($current, ['viewmatakuliah.php','inputmatakuliah.php','editmatakuliah.php']) ? 'class="active"' : '' ?>>
            Matakuliah
        </a>

    </div>
</nav>