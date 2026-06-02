<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .result { background: #e8f5e9; padding: 15px; border-radius: 6px; margin-top: 15px; }
        input, textarea { padding: 5px; width: 300px; }
        label { display: inline-block; width: 90px; }
        .form-group { margin-bottom: 8px; }
    </style>
</head>
<body>
    <?php
    // Fungsi untuk membersihkan input (mencegah XSS)
    function bersihkan_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name    = $email = $comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name    = bersihkan_input($_POST["name"]);
        $email   = bersihkan_input($_POST["email"]);
        $comment = bersihkan_input($_POST["comment"]);

        echo "<div class='result'>";
        echo "<h3>Komentar Masuk:</h3>";
        echo "Nama : " . $name . "<br>";
        echo "Email : " . $email . "<br>";
        echo "Komentar : " . $comment . "<br>";
        echo "<hr>";
        echo "<small style='color:green;'>✓ Input telah dibersihkan dari karakter berbahaya (XSS protection aktif)</small>";
        echo "</div>";
    }
    ?>

    <h2>Form Komentar</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name"><br>
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email"><br>
        </div>
        <div class="form-group">
            <label>Komentar:</label>
            <textarea name="comment" rows="5" cols="40"></textarea><br>
        </div>
        <input type="submit" value="sinpan">
        <input type="reset" value="bersihkan">
    </form>
</body>
</html>
