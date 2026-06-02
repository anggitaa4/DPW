<?php
include 'koneksi.php';
 
if (isset($_GET['hapus']) && $_GET['hapus'] != '') {
    $nim = mysqli_real_escape_string($link, trim($_GET['hapus']));
    $query = "DELETE FROM t_mahasiswa WHERE nim='$nim'";
    mysqli_query($link, $query);
    header("location:viewmahasiswa.php?deleted=1");
    exit;
}
 
if (isset($_POST['update'])) {
    $nim_lama = mysqli_real_escape_string($link, trim($_POST['nim_lama']));
    $nim      = mysqli_real_escape_string($link, trim($_POST['nim']));
    $namaMhs  = mysqli_real_escape_string($link, trim($_POST['namaMhs']));
    $prodi    = mysqli_real_escape_string($link, trim($_POST['prodi']));
    $alamat   = mysqli_real_escape_string($link, trim($_POST['alamat']));
    $noHP     = mysqli_real_escape_string($link, trim($_POST['noHP']));
 
    $query = "UPDATE t_mahasiswa SET nim='$nim', namaMhs='$namaMhs', prodi='$prodi', alamat='$alamat', noHP='$noHP'
              WHERE nim='$nim_lama'";
    mysqli_query($link, $query);
    header("location:viewmahasiswa.php?success=1");
    exit;
}

if (isset($_POST['input'])) {
    $nim     = mysqli_real_escape_string($link, trim($_POST['nim']));
    $namaMhs = mysqli_real_escape_string($link, trim($_POST['namaMhs']));
    $prodi   = mysqli_real_escape_string($link, trim($_POST['prodi']));
    $alamat  = mysqli_real_escape_string($link, trim($_POST['alamat']));
    $noHP    = mysqli_real_escape_string($link, trim($_POST['noHP']));
 
    if ($nim != "" && $namaMhs != "" && $noHP != "") {
        $cek = mysqli_query($link, "SELECT * FROM t_mahasiswa WHERE nim='$nim'");
        if (mysqli_num_rows($cek) == 0) {
            $query = "INSERT INTO t_mahasiswa (nim, namaMhs, prodi, alamat, noHP)
                      VALUES ('$nim', '$namaMhs', '$prodi', '$alamat', '$noHP')";
            mysqli_query($link, $query);
        }
        header("location:viewmahasiswa.php?success=1");
        exit;
    } else {
        header("location:viewmahasiswa.php?error=empty");
        exit;
    }
}

$edit_data = null;
if (isset($_GET['edit']) && $_GET['edit'] != '') {
    $nim_edit = mysqli_real_escape_string($link, trim($_GET['edit']));
    $res_edit = mysqli_query($link, "SELECT * FROM t_mahasiswa WHERE nim='$nim_edit'");
    $edit_data = mysqli_fetch_assoc($res_edit);
}
 
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, trim($_GET['keyword'])) : '';
 
if ($keyword !== '') {
    $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$keyword%' ORDER BY nim ASC";
} else {
    $query = "SELECT * FROM t_mahasiswa ORDER BY nim ASC";
}
 
$result = mysqli_query($link, $query);
$total  = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .alert-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            z-index: 9998;
        }

        .alert-overlay.show {
            display: block;
        }

        .alert-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px 50px;
            border-radius: 16px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            z-index: 9999;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            min-width: 300px;
        }

        .alert-popup.show {
            display: block;
        }

        .alert-popup.alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .alert-popup.alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .alert-popup .alert-icon {
            font-size: 40px;
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert-overlay show" id="alertOverlay"></div>
    <div class="alert-popup alert-success show" id="alertPopup">
        <span class="alert-icon">✅</span>
        Data berhasil disimpan!
    </div>
<?php endif; ?>

<?php if (isset($_GET['deleted'])): ?>
    <div class="alert-overlay show" id="alertOverlay"></div>
    <div class="alert-popup alert-success show" id="alertPopup">
        Data berhasil dihapus!
    </div>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <div class="alert-overlay show" id="alertOverlay"></div>
    <div class="alert-popup alert-danger show" id="alertPopup">
        <span class="alert-icon">❌</span>
        Harap isi semua field yang wajib diisi!
    </div>
<?php endif; ?>

<div class="container">
    <div class="card">
        <h1>Tabel <span>Mahasiswa</span></h1>
        <p class="page-subtitle">Kelola data seluruh mahasiswa</p>

        <?php if (isset($_GET['tambah']) || $edit_data): ?>
        <div class="form-container">
            <form method="POST" action="viewmahasiswa.php">
                <fieldset>
                    <legend><?= $edit_data ? 'Edit Data Mahasiswa' : 'Input Data Mahasiswa' ?></legend>
 
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="nim_lama" value="<?= htmlspecialchars($edit_data['nim']) ?>">
                    <?php endif; ?>
 
                    <div class="form-group">
                        <label for="nim">NIM :</label>
                        <input type="number" name="nim" id="nim" placeholder="Contoh: 20210001" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['nim']) : '' ?>">
                    </div>
 
                    <div class="form-group">
                        <label for="namaMhs">Nama Mahasiswa :</label>
                        <input type="text" name="namaMhs" id="namaMhs" placeholder="Contoh: Budi Santoso" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['namaMhs']) : '' ?>">
                    </div>
 
                    <div class="form-group">
                        <label for="prodi">Program Studi :</label>
                        <input type="text" name="prodi" id="prodi" placeholder="Contoh: Teknik Informatika"
                               value="<?= $edit_data ? htmlspecialchars($edit_data['prodi']) : '' ?>">
                    </div>
 
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Contoh: Jl. Mawar No.10, Madiun"
                               value="<?= $edit_data ? htmlspecialchars($edit_data['alamat']) : '' ?>">
                    </div>
 
                    <div class="form-group">
                        <label for="noHP">No HP :</label>
                        <input type="text" name="noHP" id="noHP" placeholder="Contoh: 081222333444" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['noHP']) : '' ?>">
                    </div>
                </fieldset>
 
                <div class="form-actions">
                    <?php if ($edit_data): ?>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <?php else: ?>
                        <button type="submit" name="input" class="btn btn-primary">Simpan</button>
                    <?php endif; ?>
                    <a href="viewmahasiswa.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        <?php endif; ?>

        <div class="actions-bar">
            <a href="viewmahasiswa.php?tambah=1" class="btn btn-primary">Tambah Mahasiswa</a>
            <form class="search-form" method="GET" action="viewmahasiswa.php">
                <input type="text" name="keyword" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword): ?>
                    <a href="viewmahasiswa.php" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($keyword): ?>
            <p class="search-result-info">
                Menampilkan <span><?= $total ?></span> hasil untuk: "<span><?= htmlspecialchars($keyword) ?></span>"
            </p>
        <?php endif; ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($total > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><span class='badge-id'>" . htmlspecialchars($data['nim']) . "</span></td>";
                        echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                        echo "<td>
                            <div class='action-buttons'>
                                <a href='viewmahasiswa.php?edit=" . urlencode($data['nim']) . "' class='btn btn-warning'>Edit</a>
                                <a href='viewmahasiswa.php?hapus=" . urlencode($data['nim']) . "' class='btn btn-danger'
                                   onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>Tidak ada data mahasiswa ditemukan.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    const popup = document.getElementById('alertPopup');
    const overlay = document.getElementById('alertOverlay');

    if (popup) {
        setTimeout(function() {
            popup.style.transition = 'opacity 0.5s';
            overlay.style.transition = 'opacity 0.5s';
            popup.style.opacity = '0';
            overlay.style.opacity = '0';

            setTimeout(() => {
                popup.remove();
                overlay.remove();
            }, 500);
        }, 3000);
    }
</script>

</body>
</html>