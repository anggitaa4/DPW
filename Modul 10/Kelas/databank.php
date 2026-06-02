<?php
require_once ('kelas/akunBank.php');

$data1 = new akunBank(nomorAkun: "001", nominal: 10000);
$data1->setNama("Budi Santoso");

$data2 = new akunBank(nomorAkun: "002", nominal: 10000);
$data2->setNama("Andi Pratama");

echo "<h3>=== DATA AKUN BANK ===</h3>";

// Tampilkan saldo awal
echo $data1->tampilUang() . "<br>";
echo $data2->tampilUang() . "<br><br>";

// Tambah uang ke akun 1
echo "<h4>--- Transaksi Akun 001 ---</h4>";
echo $data1->tambahUang(50000) . "<br>";
echo $data1->kurangUang(20000) . "<br>";
echo $data1->tampilUang() . "<br>";
echo $data1->hitungPajak() . "<br><br>";

// Transaksi akun 2
echo "<h4>--- Transaksi Akun 002 ---</h4>";
echo $data2->tambahUang(100000) . "<br>";
echo $data2->tampilUang() . "<br>";
echo $data2->hitungPajak() . "<br>";
?>
