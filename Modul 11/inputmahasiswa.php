<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa - SisInfoKampus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">

    <div class="card">

        <h1>Input <span>Mahasiswa</span></h1>
        <p class="page-subtitle">
            Tambahkan data mahasiswa baru
        </p>

        <div class="form-container">

            <form id="form_mahasiswa"
                  action="proses_inputmahasiswa.php"
                  method="POST">

                <fieldset>

                    <legend>
                        Input Data Mahasiswa
                    </legend>

                    <div class="form-group">
                        <label for="nim">NIM :</label>

                        <input type="number"
                               name="nim"
                               id="nim"
                               placeholder="Contoh: 20210001"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="namaMhs">
                            Nama Mahasiswa :
                        </label>

                        <input type="text"
                               name="namaMhs"
                               id="namaMhs"
                               placeholder="Contoh: Budi Santoso"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="prodi">
                            Program Studi :
                        </label>

                        <input type="text"
                               name="prodi"
                               id="prodi"
                               placeholder="Contoh: Teknik Informatika"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">
                            Alamat :
                        </label>

                        <input type="text"
                               name="alamat"
                               id="alamat"
                               placeholder="Contoh: Jl. Mawar No.10, Madiun"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="noHP">
                            No HP :
                        </label>

                        <input type="text"
                               name="noHP"
                               id="noHP"
                               placeholder="Contoh: 081222333444"
                               required>
                    </div>

                </fieldset>

                <div class="form-actions">

                    <button type="submit"
                            name="input"
                            class="btn btn-primary">

                        Simpan

                    </button>

                    <a href="viewmahasiswa.php"
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