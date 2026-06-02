<?php
// Soal Cerita 2: Menentukan pecahan uang Ani

$jumlah = 1387500;
$pecahan = array(100000, 50000, 20000, 10000, 5000, 2000, 500);

echo "<h2>Pecahan Uang Ani</h2>";
echo "<p>Total uang yang diambil: Rp. " . number_format($jumlah, 0, ',', '.') . ",-</p>";
echo "<hr>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Pecahan</th><th>Jumlah Lembar/Keping</th></tr>";

$sisa = $jumlah;
foreach ($pecahan as $p) {
    $lembar = (int)($sisa / $p);
    $sisa   = $sisa % $p;
    echo "<tr>";
    echo "<td>Rp. " . number_format($p, 0, ',', '.') . ",-</td>";
    echo "<td>" . $lembar . " lembar/keping</td>";
    echo "</tr>";
}

echo "</table>";
echo "<p>Sisa uang: Rp. $sisa</p>";
?>