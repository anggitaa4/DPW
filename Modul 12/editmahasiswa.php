<?php
  include 'koneksi.php';

  if (isset($_GET['nim'])) {
    $db = new Database();
    $con = $db->getConnection();
    
    $npm = $_GET["npm"];

    $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE nim = ?");
    $stmt->bind_param("i", $nim);
    
    if (!$stmt->execute()) {
        die("Query Error: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if (!$data) {
        $stmt->close();
        $con->close();
        header("location:viewmahasiswa.php");
        exit;
    }
    
  } else {
    header("location:viewmahasiswa.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa (OOP) — SIAKAD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIAKAD<span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php"> Dashboard</a></li>
            <li><a href="viewdosen.php"> Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php"> Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Edit Data Mahasiswa (OOP)</h1>
        <p>Ubah informasi data mahasiswa</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title"> Edit Data Mahasiswa</div>
        <form action="proses_editmahasiswa.php" method="post">
            <div class="form-group">
                <label for="npm">NIM</label>
                <input type="number" name="nim" id="nim" value="<?php echo $data['nim']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" value="<?php echo htmlspecialchars($data['namaMhs']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi" value="<?php echo htmlspecialchars($data['prodi']); ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="tel" name="noHP" id="noHP" value="<?php echo htmlspecialchars($data['noHP']); ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-success"> Update Data</button>
                <a href="viewmahasiswa.php" class="btn btn-danger">← Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
<?php
  // TUTUP DI SINI: Setelah data selesai dimuat ke dalam tag HTML input value
  $stmt->close();
  $con->close();
?>