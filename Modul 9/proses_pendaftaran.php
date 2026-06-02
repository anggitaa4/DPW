<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proses Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .container { background: #f5f5f5; padding: 20px; border-radius: 8px; max-width: 500px; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nim     = htmlspecialchars($_POST["nim"]);
            $nama    = htmlspecialchars($_POST["nama"]);
            $email   = htmlspecialchars($_POST["email"]);
            $tempat  = htmlspecialchars($_POST["tempat"]);
            $tgl     = htmlspecialchars($_POST["tgl_lahir"]);
            $alamat  = htmlspecialchars($_POST["alamat"]);
            $gender  = htmlspecialchars($_POST["gender"]);

            echo "Selamat datang <b>" . $nama . "</b><br>";
            echo "NIM : " . $nim . "<br>";
            echo "Email : " . $email . "<br>";
            echo "Tempat, Tanggal Lahir : " . $tempat . ", " . $tgl . "<br>";
            echo "Alamat : " . $alamat . "<br>";
            echo "Jenis Kelamin : " . $gender . "<br>";
        } else {
            echo "<p style='color:red;'>Tidak ada data yang dikirim.</p>";
        }
        ?>
        <br><a href="form_pendaftaran.html">← Kembali ke Form</a>
    </div>
</body>
</html>
