<?php
include 'koneksi.php';
 
if (isset($_GET['idDosen'])) {
    $id     = intval($_GET['idDosen']);
    $query  = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);
 
    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
 
    $data      = mysqli_fetch_assoc($result);
    $idDosen   = $data['idDosen'];
    $namaDosen = $data['namaDosen'];
    $noHP      = $data['noHP'];
} else {
    header("location:viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?> 
<div class="container">
    <div class="card">
        <h1>Edit <span>Data</span></h1>
        <p class="page-subtitle">Ubah data dosen yang dipilih</p>
 
        <div class="form-container">
            <form id="form_dosen" action="proses_editdosen.php" method="post">
                <fieldset>
                    <legend>Edit Data Dosen</legend>
 
                    <div class="form-group">
                        <label for="idDosenDisabled">ID :</label>
                        <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                        <input type="text" id="idDosenDisabled" value="<?php echo $idDosen; ?>" disabled>
                    </div>
 
                    <div class="form-group">
                        <label for="namaDosen">Nama Dosen :</label>
                        <input type="text" name="namaDosen" id="namaDosen"
                               value="<?php echo htmlspecialchars($namaDosen); ?>" required>
                    </div>
 
                    <div class="form-group">
                        <label for="noHP">No HP :</label>
                        <input type="text" name="noHP" id="noHP"
                               value="<?php echo htmlspecialchars($noHP); ?>" required>
                    </div>
                </fieldset>
 
                <div class="form-actions">
                    <button type="submit" name="edit" class="btn btn-primary">Update Data</button>
                    <a href="viewdosen.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>