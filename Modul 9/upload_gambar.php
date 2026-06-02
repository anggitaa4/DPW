<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords" content="{tulis nim anda disini}">
    <meta name="author" content="{tulis nama anda disini}">
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        .box { background: white; padding: 25px; border-radius: 8px; max-width: 450px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        input[type="submit"] { padding: 8px 20px; background: #2196F3; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .msg-ok  { color: green; font-weight: bold; }
        .msg-err { color: red; font-weight: bold; }
        a { color: #2196F3; }
    </style>
</head>
<body>
<div class="box">
    <h2>Upload Gambar</h2>

    <?php
    // Semua kode pengolahan file HANYA dijalankan saat ada pengiriman data (fix warning)
    if (isset($_POST["submit"])) {

        $target_dir  = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk    = 1;
        $tipeGambar  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // 1. Cek apakah file berupa gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            echo "<p class='msg-ok'>File berupa citra/gambar - " . $check["mime"] . ".</p>";
            $uploadOk = 1;
        } else {
            echo "<p class='msg-err'>File bukan gambar.</p>";
            $uploadOk = 0;
        }

        // 2. Deteksi apakah ada file dengan nama yang sama
        if (file_exists($target_file)) {
            echo "<p class='msg-err'>Sorry, file already exists.</p>";
            $uploadOk = 0;
        }

        // 3. Check file size (maks 500KB)
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "<p class='msg-err'>Sorry, file anda terlalu besar.</p>";
            $uploadOk = 0;
        }

        // 4. Filter format file
        if ($tipeGambar != "jpg" && $tipeGambar != "png"
            && $tipeGambar != "gif" && $tipeGambar != "jpeg") {
            echo "<p class='msg-err'>Sorry, hanya file JPG, JPEG, PNG & GIF.</p>";
            $uploadOk = 0;
        }

        // 5. Proses upload jika semua kriteria terpenuhi
        if ($uploadOk == 0) {
            echo "<p class='msg-err'>Sorry, File anda gagal upload.</p>";
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo "<p class='msg-ok'>File " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " berhasil Upload.</p>";
            } else {
                echo "<p class='msg-err'>Sorry, Ada eror saat upload.</p>";
            }
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <p><label>Pilih Gambar yang akan di upload: </label><br>
            <input type="file" name="gambar" id="gambar1"></p>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <p><a href="galery.php"> Lihat Galeri Gambar</a></p>
</div>
</body>
</html>
