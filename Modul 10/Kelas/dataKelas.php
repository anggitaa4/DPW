<?php
require_once ('kelas/mahasiswa.php');

$mhs1 = new mahasiswa(nama: "Nama Anda");
$mhs1->setNIM("NIM anda");
$mhs1->setKelas("Kelas anda");
$mhs1->setJurusan("Teknik Informatika");
$mhs1->setUmur(20);

$mhs2 = new mahasiswa(nama: "Budi Santoso");
$mhs2->setNIM("2024001");
$mhs2->setKelas("TI-3A");
$mhs2->setJurusan("Teknik Informatika");
$mhs2->setUmur(19);

echo "<h3>=== DATA KELAS MAHASISWA ===</h3>";

// tampilkan nama, nim, dan kelas dari $mhs1
echo "<h4>--- Mahasiswa 1 ---</h4>";
echo "Nama   : " . $mhs1->getNama() . "<br>";
echo "NIM    : " . $mhs1->getNim() . "<br>";
echo "Kelas  : " . $mhs1->getKelas() . "<br>";
echo "Jurusan: " . $mhs1->getJurusan() . "<br>";
echo "Umur   : " . $mhs1->getUmur() . " tahun<br>";

echo "<h4>--- Mahasiswa 2 ---</h4>";
echo "Nama   : " . $mhs2->getNama() . "<br>";
echo "NIM    : " . $mhs2->getNim() . "<br>";
echo "Kelas  : " . $mhs2->getKelas() . "<br>";
echo "Jurusan: " . $mhs2->getJurusan() . "<br>";
echo "Umur   : " . $mhs2->getUmur() . " tahun<br>";
?>
