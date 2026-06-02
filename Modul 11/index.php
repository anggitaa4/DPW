<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Info Kampus - Dashboard</title>
    <link rel="stylesheet" href="/DPW/Modul%2011/css/style.css">
    <style>
        .menu-card-1 { background: linear-gradient(135deg, #ede9fe, #ddd6fe) !important; border-color: #c4b5fd !important; }
        .menu-card-2 { background: linear-gradient(135deg, #e0f2fe, #bae6fd) !important; border-color: #7dd3fc !important; }
        .menu-card-3 { background: linear-gradient(135deg, #dcfce7, #bbf7d0) !important; border-color: #86efac !important; }
        .menu-card-1 .menu-icon, .menu-card-1 .menu-title, .menu-card-1 .menu-desc { color: #7c3aed !important; }
        .menu-card-2 .menu-icon, .menu-card-2 .menu-title, .menu-card-2 .menu-desc { color: #0369a1 !important; }
        .menu-card-3 .menu-icon, .menu-card-3 .menu-title, .menu-card-3 .menu-desc { color: #15803d !important; }
        .menu-icon { margin-bottom: 14px; }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
 
<div class="container">
    <div class="card">
        <h1>Sistem Informasi <span>Kampus</span></h1>
        <p class="page-subtitle">Aplikasi CRUD - Pengelolaan Data Akademik</p>
 
        <?php
        $jml_dosen = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(*) FROM t_dosen"))[0]      ?? 0;
        $jml_mhs   = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(*) FROM t_mahasiswa"))[0]  ?? 0;
        $jml_mk    = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(*) FROM t_matakuliah"))[0] ?? 0;
        ?>
 
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-number"><?= $jml_dosen ?></div>
                <div class="stat-label">Total Dosen</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $jml_mhs ?></div>
                <div class="stat-label">Total Mahasiswa</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= $jml_mk ?></div>
                <div class="stat-label">Total Matakuliah</div>
            </div>
        </div>
 
        <div class="menu-grid">
            <a href="viewdosen.php" class="menu-card menu-card-1">
                <div class="menu-icon"></div>
                <div class="menu-title">DATA DOSEN</div>
                <div class="menu-desc">Kelola Data Dosen &amp; cari</div>
            </a>
            <a href="viewmahasiswa.php" class="menu-card menu-card-2">
                <div class="menu-icon"></div>
                <div class="menu-title"> DATA MAHASISWA</div>
                <div class="menu-desc">Kelola Data mahasiswa &amp; cari</div>
            </a>
            <a href="viewmatakuliah.php" class="menu-card menu-card-3">
                <div class="menu-icon"></div>
                <div class="menu-title">DATA MATAKULIAH</div>
                <div class="menu-desc">Kelola Data Matakuliah &amp; cari</div>
            </a>
        </div>
    </div>
</div>
</body>
</html>