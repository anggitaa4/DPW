<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Matakuliah - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <div class="card">

        <h1>Input <span>Matakuliah</span></h1>
        <p class="page-subtitle">Tambahkan data matakuliah baru</p>

        <div class="form-container">

            <form id="form_matakuliah"
                  action="proses_inputmatakuliah.php"
                  method="POST">

                <fieldset>
                    <legend>Input Data Matakuliah</legend>

                    <div class="form-group">
                        <label for="kodeMK">Kode MK :</label>
                        <input type="number"
                               name="kodeMK"
                               id="kodeMK"
                               placeholder="Contoh: 101"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="namaMK">Nama Matakuliah :</label>
                        <input type="text"
                               name="namaMK"
                               id="namaMK"
                               placeholder="Contoh: Pemrograman Web"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="sks">SKS :</label>
                        <input type="number"
                               name="sks"
                               id="sks"
                               placeholder="Contoh: 3"
                               min="1"
                               max="6"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam :</label>
                        <input type="number"
                               name="jam"
                               id="jam"
                               placeholder="Contoh: 3"
                               min="1"
                               required>
                    </div>

                </fieldset>

                <div class="form-actions">
                    <button type="submit"
                            name="input"
                            class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="viewmatakuliah.php"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>