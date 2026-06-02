<?php

/*
=== ANALISIS ERROR buah.php ===

Kode asli:
    $mango->warna = 'Yellow';   // ERROR!
    $mango->buah  = '300';      // ERROR!

PENYEBAB ERROR:
1. $mango->warna = 'Yellow';
   -> Properti $warna bersifat 'protected', artinya TIDAK BISA diakses
      langsung dari luar kelas. Akses langsung hanya bisa untuk properti 'public'.

2. $mango->buah = '300';
   -> Properti $berat bersifat 'private', artinya HANYA bisa diakses
      dari dalam kelas itu sendiri. Bahkan kelas turunan pun tidak bisa.
      Selain itu, nama variabelnya adalah $berat bukan $buah,
      sehingga ini akan membuat properti baru yang tidak diinginkan.

KESIMPULAN:
Properti dengan access modifier 'protected' dan 'private' tidak dapat diakses
langsung dari luar kelas. Diperlukan method getter/setter untuk mengaksesnya.
Properti 'public' bisa diakses langsung dari mana saja.

PERBAIKAN: Tambahkan getter/setter atau ubah access modifier ke public.
*/

class buah
{
    public $nama;
    protected $warna;
    private $berat;

    // Getter dan Setter untuk $warna (protected)
    public function getWarna()
    {
        return $this->warna;
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    // Getter dan Setter untuk $berat (private)
    public function getBerat()
    {
        return $this->berat;
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
    }
}

$mango = new buah();
$mango->nama = 'Mango';          // OK - public
$mango->setWarna('Yellow');      // DIPERBAIKI - gunakan setter
$mango->setBerat('300');         // DIPERBAIKI - gunakan setter

echo "Nama  : " . $mango->nama . "<br>";
echo "Warna : " . $mango->getWarna() . "<br>";
echo "Berat : " . $mango->getBerat() . " gram<br>";
?>
