<?php

$namaBuah = array("Nanas", "Mangga", "jeruk", "Apel", "Melon", "Manggis");
echo "saya suka " . $namaBuah[0] . ", " . " dan " . $namaBuah[1] . " dan " . $namaBuah[2] . ".";

// tampikan Mangga
echo "saya suka " . $namaBuah[1];
// tampikan Jeruk
echo "saya suka " . $namaBuah[2];
// tampikan Apel
echo "saya suka " . $namaBuah[3];
// tampikan Melon
echo "saya suka " . $namaBuah[4];

// array dengan spesifik index
$umur = array("mendy" => "19 Tahun", "reva" => "18 Tahun", "dinda" => "18 Tahun");
$umur['ummi'] = "18 Tahun";
echo "Umur mendy adalah " . $umur['mendy'];
// tampikan semua umur
foreach ($umur as $nama => $usia) {
    echo "$nama umurnya adalah $usia <br>";
}
?>