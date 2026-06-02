<?php
// Soal Cerita 1: Menghitung Gaji Bersih Obi

$gaji_pokok    = 3250000;
$tunjangan     = 1200000;
$persen_pajak  = 10 / 100; // 10%

// Gaji kotor = gaji pokok + tunjangan
$gaji_kotor = $gaji_pokok + $tunjangan;

// Pajak = 10% dari gaji kotor
$pajak = $persen_pajak * $gaji_kotor;

// Gaji bersih = gaji kotor - pajak
$gaji_bersih = $gaji_kotor - $pajak;

echo "<h2>Perhitungan Gaji Obi</h2>";
echo "<p>Gaji Pokok      : Rp. " . number_format($gaji_pokok, 0, ',', '.') . ",-</p>";
echo "<p>Tunjangan Jabatan: Rp. " . number_format($tunjangan, 0, ',', '.') . ",-</p>";
echo "<p>Gaji Kotor      : Rp. " . number_format($gaji_kotor, 0, ',', '.') . ",-</p>";
echo "<p>Pajak (10%)     : Rp. " . number_format($pajak, 0, ',', '.') . ",-</p>";
echo "<hr>";
echo "<p><strong>Gaji Bersih     : Rp. " . number_format($gaji_bersih, 0, ',', '.') . ",-</strong></p>";
?>