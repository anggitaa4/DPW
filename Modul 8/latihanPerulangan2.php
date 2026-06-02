<?php
$angka = array(12, 13, 15, 16, 67, 189, 346, 876, 54232, 3256);

echo "<h2>Cek Ganjil / Genap</h2>";

foreach ($angka as $nilai) {
    if ($nilai % 2 == 0) {
        $status = "Genap";
    } else {
        $status = "Ganjil";
    }
    echo "Nomor : $nilai $status <br>";
}
?>