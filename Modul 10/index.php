<?php
require_once ('kelas/Manusia.php');

$Mayra = new Manusia();
$Mayra->setNama("Mayra Ruhandini");
$Mayra->setUmur(21);

$Dinda = new Manusia();
$Dinda->setNama("Dinda Aulia");
$Dinda->setUmur(19);

$saya = new Manusia();
$saya->setNama("Mendysia Anggita Putri");
$saya->setUmur(20);

echo "Nama lengkap Mayra: " . $Mayra->getNama(); // $mayra → $Mayra
echo "<br>";
echo "Umur Mayra: " . $saya->getUmur() . " tahun";
echo "<br>";

echo "Nama lengkap Dinda: " . $Dinda->getNama(); // $dinda → $Dinda
echo "<br>";
echo "NIK Dinda: " . $Dinda->getNIK();
echo "<br>";
echo "Umur Dinda: " . $Dinda->getUmur() . " tahun";
echo "<br>";


echo "Identitas Saya: " . $saya->getNama();
echo "<br>";
echo "Umur Saya: " . $saya->getUmur() . " tahun";
echo "<br>";

/*
=== KESIMPULAN ===
Dari ujicoba yang dilakukan, dapat disimpulkan:

1. Class adalah blueprint/cetakan untuk membuat objek. Class Manusia memiliki
   properti (variabel) dan method (fungsi).

2. Access Modifier mengatur hak akses:
   - public: dapat diakses dari mana saja (dalam/luar kelas)
   - protected: hanya dapat diakses dari dalam kelas dan kelas turunannya
   - private: hanya dapat diakses dari dalam kelas itu sendiri

3. Properti $name dan $nik menggunakan 'protected' sehingga tidak bisa
   diakses langsung dari luar kelas (misalnya $budi->name akan error).
   Oleh karena itu digunakan getter (getNama) dan setter (setNama).

4. Getter adalah fungsi untuk membaca nilai properti,
   sedangkan setter adalah fungsi untuk mengubah nilai properti.

5. Method getNIK() awalnya bersifat 'private' sehingga tidak bisa
   dipanggil dari luar kelas. Diubah menjadi 'public' agar bisa diakses.

6. Variabel $umur ditambahkan beserta fungsi getter (getUmur) dan
   setter (setUmur) untuk mengikuti prinsip enkapsulasi OOP.
*/
?>