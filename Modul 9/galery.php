<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f0f2f5; }
        h2 { color: #333; text-align: center; }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-top: 20px;
        }
        .gallery-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            overflow: hidden;
            width: 180px;
            text-align: center;
        }
        .gallery-item img {
            width: 180px;
            height: 140px;
            object-fit: cover;
            display: block;
        }
        .gallery-item p {
            font-size: 11px;
            color: #666;
            padding: 5px;
            margin: 0;
            word-break: break-all;
        }
        .empty { text-align: center; color: #999; margin-top: 40px; font-size: 16px; }
        .nav { text-align: center; margin-bottom: 10px; }
        .nav a { color: #2196F3; text-decoration: none; margin: 0 10px; }
    </style>
</head>
<body>
    <h2>🖼️ Galeri Gambar</h2>
    <div class="nav">
        <a href="upload_gambar.php">⬆ Upload Gambar</a>
    </div>

    <div class="gallery">
    <?php
    $fileList = glob(pattern: 'gambar/*');
    $count = 0;

    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            // Hanya tampilkan file gambar
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $count++;
                $baseName = basename($filename);
                echo "<div class='gallery-item'>";
                echo "  <img src='" . htmlspecialchars($filename) . "' alt='" . htmlspecialchars($baseName) . "' loading='lazy'>";
                echo "  <p>" . htmlspecialchars($baseName) . "</p>";
                echo "</div>";
            }
        }
    }

    if ($count === 0) {
        echo "<div class='empty'>Belum ada gambar di folder.<br><a href='upload_gambar.php'>Upload sekarang</a></div>";
    }
    ?>
    </div>

    <p style="text-align:center; color:#aaa; font-size:12px; margin-top:20px;">
        Total: <?= $count ?> gambar
    </p>
</body>
</html>
