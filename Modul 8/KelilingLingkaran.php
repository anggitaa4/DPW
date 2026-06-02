<?php

$pi = 3.14159265358979;
$jari_jari = 15; // dalam cm

$keliling = 2 * $pi * $jari_jari;

echo "<h2>Menghitung Keliling Lingkaran</h2>";
echo "<p>Jari-jari (r) = $jari_jari cm</p>";
echo "<p>π (pi)        = $pi</p>";
echo "<p>Rumus         = 2 × π × r</p>";
echo "<hr>";
echo "<p><strong>Keliling Lingkaran = " . $keliling . " cm</strong></p>";
?>