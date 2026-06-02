<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSON - Array Nama & Umur</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f5f5f5; }
        .box { background: white; padding: 25px; border-radius: 8px; max-width: 700px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        h3 { color: #555; border-bottom: 2px solid #eee; padding-bottom: 6px; }
        pre {
            background: #263238; color: #80cbc4; padding: 15px;
            border-radius: 6px; overflow-x: auto; font-size: 13px; line-height: 1.5;
        }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th { background: #3f51b5; color: white; padding: 10px; text-align: left; }
        td { padding: 8px 12px; border-bottom: 1px solid #eee; font-size: 14px; }
        tr:nth-child(even) td { background: #f5f5f5; }
        .badge { background: #e3f2fd; color: #1565c0; padding: 2px 8px; border-radius: 10px; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
<div class="box">
    <h2>📋 Task 9 — Array ke JSON</h2>

    <?php
    // Array data mahasiswa (min 15 data) dengan index nama dan umur
    $mahasiswa = [
        ["nama" => "Andi Pratama",      "umur" => 20],
        ["nama" => "Budi Santoso",      "umur" => 21],
        ["nama" => "Citra Dewi",        "umur" => 19],
        ["nama" => "Dian Rahayu",       "umur" => 22],
        ["nama" => "Eko Wijaya",        "umur" => 20],
        ["nama" => "Fitri Handayani",   "umur" => 21],
        ["nama" => "Gilang Ramadhan",   "umur" => 23],
        ["nama" => "Hana Kusuma",       "umur" => 19],
        ["nama" => "Irfan Maulana",     "umur" => 22],
        ["nama" => "Jasmine Putri",     "umur" => 20],
        ["nama" => "Krisna Bayu",       "umur" => 21],
        ["nama" => "Lestari Ningrum",   "umur" => 20],
        ["nama" => "Muhammad Rizki",    "umur" => 22],
        ["nama" => "Nadia Safitri",     "umur" => 19],
        ["nama" => "Oscar Firmansyah",  "umur" => 23],
    ];

    // Konversi array ke JSON
    $jsonData = json_encode($mahasiswa, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Decode kembali untuk membuktikan hasil JSON valid
    $decoded = json_decode($jsonData, true);
    ?>

    <!-- 1. Tampilkan Array PHP -->
    <h3>1. Array PHP (<?= count($mahasiswa) ?> data)</h3>
    <table>
        <tr><th>#</th><th>Nama</th><th>Umur</th></tr>
        <?php foreach ($mahasiswa as $i => $m): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($m["nama"]) ?></td>
            <td><span class="badge"><?= $m["umur"] ?> tahun</span></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- 2. Tampilkan JSON -->
    <h3 style="margin-top:25px;">2. Hasil Konversi ke JSON (json_encode)</h3>
    <pre><?= htmlspecialchars($jsonData) ?></pre>

    <!-- 3. Decode kembali -->
    <h3>3. Decode JSON kembali ke PHP (json_decode)</h3>
    <p style="font-size:13px; color:#555;">Menampilkan 3 data pertama hasil decode:</p>
    <?php
    echo "<ul style='font-size:14px;'>";
    for ($i = 0; $i < 3; $i++) {
        echo "<li><b>" . htmlspecialchars($decoded[$i]["nama"]) . "</b> — " . $decoded[$i]["umur"] . " tahun</li>";
    }
    echo "</ul>";
    ?>

    <!-- 4. Info JSON -->
    <h3>4. Informasi JSON</h3>
    <p style="font-size:13px; color:#555;">
        Jumlah data: <b><?= count($decoded) ?></b><br>
        Panjang string JSON: <b><?= strlen($jsonData) ?></b> karakter<br>
        JSON Valid: <b><?= json_last_error() === JSON_ERROR_NONE ? "Ya" : "Tidak" ?></b>
    </p>
</div>
</body>
</html>
