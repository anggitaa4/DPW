<?php
include 'koneksi.php';
 
if (isset($_GET['kodeMK'])) {
    $kode   = intval($_GET['kodeMK']);
    $query  = "SELECT * FROM t_matakuliah WHERE kodeMK='$kode'";
    $result = mysqli_query($link, $query);
 
    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
 
    $data   = mysqli_fetch_assoc($result);
    $kodeMK = $data['kodeMK'];
    $namaMK = $data['namaMK'];
    $sks    = $data['sks'];
    $jam    = $data['jam'];
} else {
    header("location:viewmatakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Matakuliah - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?> 
<div class="container">
    <div class="card">
        <h1>&#9998; Edit <span>Matakuliah</span></h1>
        <p class="page-subtitle">Ubah data matakuliah yang dipilih</p>
 
        <div class="form-container">
            <form id="form_matakuliah" action="proses_editmatakuliah.php" method="post">
                <fieldset>
                    <legend>&#128218; Edit Data Matakuliah</legend>
 
                    <div class="form-group">
                        <label>Kode MK :</label>
                        <input type="hidden" name="kodeMK" value="<?php echo $kodeMK; ?>">
                        <input type="text" value="<?php echo htmlspecialchars($kodeMK); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="namaMK">Nama Matakuliah :</label>
                        <input type="text" name="namaMK" id="namaMK"
                               value="<?php echo htmlspecialchars($namaMK); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS :</label>
                        <input type="number" name="sks" id="sks"
                               value="<?php echo htmlspecialchars($sks); ?>" min="1" max="6" required>
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam :</label>
                        <input type="number" name="jam" id="jam"
                               value="<?php echo htmlspecialchars($jam); ?>" min="1" required>
                    </div>
                </fieldset>
 
                <div class="form-actions">
                    <button type="submit" name="edit" class="btn btn-primary">&#128190; Update Data</button>
                    <a href="viewmatakuliah.php" class="btn btn-secondary">&#8592; Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>