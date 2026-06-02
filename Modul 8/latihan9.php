<?php

function writeMsg($nama) {
    echo "selamat datang " . $nama . " <br>";
}
writeMsg(nama: "Ahmad");

function tambah(int $angka1, int $angka2) {
    $a = $angka1 + $angka2;
    return $a; 
}

$hasil = tambah(angka1: 5, angka2: 5);
echo ($hasil);
?>