<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Identitas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        .box { background: white; padding: 25px; border-radius: 8px; max-width: 450px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        input[type="text"], input[type="email"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        input[type="submit"], button { padding: 8px 18px; border: none; border-radius: 5px; cursor: pointer; margin-right: 8px; }
        .btn-save   { background: #4CAF50; color: white; }
        .btn-delete { background: #f44336; color: white; }
        .info { background: #e3f2fd; padding: 12px; border-radius: 6px; margin-top: 15px; font-size: 14px; }
        label { font-size: 13px; color: #555; }
    </style>
</head>
<body>
<div class="box">
    <h2>Cookies - Data Identitas</h2>

    <?php
    $msg = "";

    // Hapus cookies
    if (isset($_GET["hapus"])) {
        setcookie("c_nama",  "", time() - 3600, "/");
        setcookie("c_email", "", time() - 3600, "/");
        setcookie("c_nim",   "", time() - 3600, "/");
        $msg = "<p style='color:red;'> Cookies berhasil dihapus.</p>";
    }

    // Simpan cookies
    if (isset($_POST["simpan"])) {
        $nama  = htmlspecialchars(trim($_POST["nama"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $nim   = htmlspecialchars(trim($_POST["nim"]));

        // Simpan selama 7 hari
        setcookie("c_nama",  $nama,  time() + (7 * 24 * 3600), "/");
        setcookie("c_email", $email, time() + (7 * 24 * 3600), "/");
        setcookie("c_nim",   $nim,   time() + (7 * 24 * 3600), "/");

        // Gunakan nilai POST untuk langsung tampil (cookies baru aktif di request berikutnya)
        $_COOKIE["c_nama"]  = $nama;
        $_COOKIE["c_email"] = $email;
        $_COOKIE["c_nim"]   = $nim;

        $msg = "<p style='color:green;'> Data berhasil disimpan ke cookies (berlaku 7 hari).</p>";
    }

    echo $msg;

    // Tampilkan data dari cookies jika ada
    if (!empty($_COOKIE["c_nama"])) {
        echo "<div class='info'>";
        echo "<b> Data tersimpan di Cookies:</b><br>";
        echo "NIM   : " . $_COOKIE["c_nim"]   . "<br>";
        echo "Nama  : " . $_COOKIE["c_nama"]  . "<br>";
        echo "Email : " . $_COOKIE["c_email"] . "<br>";
        echo "<br><a href='?hapus=1' class='btn-delete' style='color:white; padding:6px 14px; background:#f44336; border-radius:4px; text-decoration:none; font-size:13px;'>🗑 Hapus Cookies</a>";
        echo "</div>";
    }
    ?>

    <h3 style="margin-top:20px;">Simpan Identitas</h3>
    <form method="post">
        <label>NIM:</label>
        <input type="text" name="nim" value="<?= $_COOKIE['c_nim'] ?? '' ?>" placeholder="Masukkan NIM">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $_COOKIE['c_nama'] ?? '' ?>" placeholder="Masukkan nama">
        <label>Email:</label>
        <input type="email" name="email" value="<?= $_COOKIE['c_email'] ?? '' ?>" placeholder="Masukkan email">
        <input type="submit" name="simpan" value="Simpan ke Cookies" class="btn-save">
    </form>
</div>
</body>
</html>
