<?php
include 'koneksi.php';

// =====================
// PROSES HAPUS
// =====================
if (isset($_GET['hapus']) && $_GET['hapus'] != '') {
    $kode_matkul = mysqli_real_escape_string($link, trim($_GET['hapus']));
    mysqli_query($link, "DELETE FROM t_matakuliah WHERE kode_matkul='$kode_matkul'");
    header("location:viewmatakuliah.php?deleted=1");
    exit;
}

// =====================
// PROSES SIMPAN EDIT
// =====================
if (isset($_POST['update'])) {
    $kode_matkul_lama = mysqli_real_escape_string($link, trim($_POST['kodeMK_lama']));
    $kode_matkul      = mysqli_real_escape_string($link, trim($_POST['kode_matkul']));
    $nama_matkul      = mysqli_real_escape_string($link, trim($_POST['namaMK']));
    $sks              = mysqli_real_escape_string($link, trim($_POST['sks']));
    $jam              = mysqli_real_escape_string($link, trim($_POST['jam']));

    $query = "UPDATE t_matakuliah SET kode_matkul='$kode_matkul', nama_matkul='$nama_matkul', sks='$sks', jam='$jam'
              WHERE kode_matkul='$kode_matkul_lama'";
    mysqli_query($link, $query);
    header("location:viewmatakuliah.php?success=1");
    exit;
}

// =====================
// PROSES SIMPAN INPUT
// =====================
if (isset($_POST['input'])) {
    $kode_matkul = mysqli_real_escape_string($link, trim($_POST['kode_matkul']));
    $nama_matkul = mysqli_real_escape_string($link, trim($_POST['namaMK']));
    $sks         = mysqli_real_escape_string($link, trim($_POST['sks']));
    $jam         = mysqli_real_escape_string($link, trim($_POST['jam']));

    $cek = mysqli_query($link, "SELECT * FROM t_matakuliah WHERE kode_matkul='$kode_matkul'");

    if (mysqli_num_rows($cek) > 0) {
        header("location:viewmatakuliah.php?tambah=1&error=duplikat");
        exit;
    }

    mysqli_query($link, "INSERT INTO t_matakuliah (kode_matkul, nama_matkul, sks, jam)
                         VALUES ('$kode_matkul', '$nama_matkul', '$sks', '$jam')");
    header("location:viewmatakuliah.php?success=1");
    exit;
}

// =====================
// AMBIL DATA EDIT
// =====================
$edit_data = null;
if (isset($_GET['edit']) && $_GET['edit'] != '') {
    $kode_matkul_edit = mysqli_real_escape_string($link, trim($_GET['edit']));
    $res_edit         = mysqli_query($link, "SELECT * FROM t_matakuliah WHERE kode_matkul='$kode_matkul_edit'");
    $edit_data        = mysqli_fetch_assoc($res_edit);
}

// =====================
// QUERY TAMPIL DATA
// =====================
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, trim($_GET['keyword'])) : '';

if ($keyword !== '') {
    $query = "SELECT * FROM t_matakuliah WHERE nama_matkul LIKE '%$keyword%' ORDER BY kode_matkul ASC";
} else {
    $query = "SELECT * FROM t_matakuliah ORDER BY kode_matkul ASC";
}

$result = mysqli_query($link, $query);
$total  = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Matakuliah - SisInfoKampus</title>
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

<?php if (isset($_GET['error']) && $_GET['error'] == 'duplikat'): ?>
    <div class="alert-overlay show" id="alertOverlay"></div>
    <div class="alert-popup alert-danger show" id="alertPopup">
        <span class="alert-icon">❌</span>
        Kode MK sudah ada, gunakan kode lain!
    </div>
<?php endif; ?>

<div class="container">
    <div class="card">
        <h1>Tabel <span>Matakuliah</span></h1>
        <p class="page-subtitle">Kelola data seluruh matakuliah</p>

        <!-- ===================== -->
        <!-- FORM TAMBAH / EDIT   -->
        <!-- ===================== -->
        <?php if (isset($_GET['tambah']) || $edit_data): ?>
        <div class="form-container">
            <form method="POST" action="viewmatakuliah.php">
                <fieldset>
                    <legend><?= $edit_data ? 'Edit Data Matakuliah' : 'Input Data Matakuliah' ?></legend>

                    <?php if ($edit_data): ?>
                        <input type="hidden" name="kodeMK_lama" value="<?= htmlspecialchars($edit_data['kode_matkul']) ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="kode_matkul">Kode MK :</label>
                        <input type="number" name="kode_matkul" id="kode_matkul" placeholder="Contoh: 101" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['kode_matkul']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="namaMK">Nama Matakuliah :</label>
                        <input type="text" name="namaMK" id="namaMK" placeholder="Contoh: Pemrograman Web" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['nama_matkul']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="sks">SKS :</label>
                        <input type="number" name="sks" id="sks" placeholder="Contoh: 3" min="1" max="6" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['sks']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam :</label>
                        <input type="number" name="jam" id="jam" placeholder="Contoh: 3" min="1" required
                               value="<?= $edit_data ? htmlspecialchars($edit_data['jam']) : '' ?>">
                    </div>
                </fieldset>

                <div class="form-actions">
                    <?php if ($edit_data): ?>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    <?php else: ?>
                        <button type="submit" name="input" class="btn btn-primary">Simpan</button>
                    <?php endif; ?>
                    <a href="viewmatakuliah.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        <?php endif; ?>

        <!-- ===================== -->
        <!-- TOMBOL & SEARCH      -->
        <!-- ===================== -->
        <div class="actions-bar">
            <a href="viewmatakuliah.php?tambah=1" class="btn btn-primary">Tambah Matakuliah</a>
            <form class="search-form" method="GET" action="viewmatakuliah.php">
                <input type="text" name="keyword" placeholder="Cari nama matakuliah..." value="<?= htmlspecialchars($keyword) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword): ?>
                    <a href="viewmatakuliah.php" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if ($keyword): ?>
            <p class="search-result-info">
                Menampilkan <span><?= $total ?></span> hasil untuk: "<span><?= htmlspecialchars($keyword) ?></span>"
            </p>
        <?php endif; ?>

        <!-- ===================== -->
        <!-- TABEL DATA           -->
        <!-- ===================== -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($total > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><span class='badge-id'>" . htmlspecialchars($data['kode_matkul']) . "</span></td>";
                        echo "<td>" . htmlspecialchars($data['nama_matkul']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['sks']) . " SKS</td>";
                        echo "<td>" . htmlspecialchars($data['jam']) . " Jam</td>";
                        echo "<td>
                            <div class='action-buttons'>
                                <a href='viewmatakuliah.php?edit=" . urlencode($data['kode_matkul']) . "' class='btn btn-warning'>Edit</a>
                                <a href='viewmatakuliah.php?hapus=" . urlencode($data['kode_matkul']) . "' class='btn btn-danger'
                                   onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                            </div>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>Tidak ada data matakuliah ditemukan.</td></tr>";
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