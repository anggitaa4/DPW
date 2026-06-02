<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Dosen - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?> 
<div class="container">
    <div class="card">
        <h1>Input <span>Data</span></h1>
        <p class="page-subtitle">Tambahkan data dosen baru</p>
 
        <div class="form-container">
            <form id="form_dosen" action="proses_inputdosen.php" method="post">
                <fieldset>
                    <legend>Input Data Dosen</legend>
 
                    <div class="form-group">
                        <label for="namaDosen">Nama Dosen :</label>
                        <input type="text" name="namaDosen" id="namaDosen"
                               placeholder="Contoh: Dr. Budi Santoso, M.Sc" required>
                    </div>
 
                    <div class="form-group">
                        <label for="noHP">No HP :</label>
                        <input type="text" name="noHP" id="noHP"
                               placeholder="Contoh: 081222333444" required>
                    </div>
                </fieldset>
 
                <div class="form-actions">
                    <button type="submit" name="input" class="btn btn-primary">Simpan</button>
                    <a href="viewdosen.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>