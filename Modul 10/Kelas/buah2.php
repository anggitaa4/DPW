<?php

/*
=== ANALISIS ERROR buah2.php ===

Kode asli:
    $mango->set_color('Yellow');   // ERROR!
    $mango->set_weight('300');     // ERROR!

PENYEBAB ERROR:
1. $mango->set_color('Yellow');
   -> Method set_color() bersifat 'protected', artinya TIDAK BISA dipanggil
      langsung dari luar kelas. Method protected hanya bisa dipanggil dari
      dalam kelas itu sendiri atau kelas turunannya.

2. $mango->set_weight('300');
   -> Method set_weight() bersifat 'private', artinya HANYA bisa dipanggil
      dari dalam kelas itu sendiri. Tidak bisa dari luar kelas maupun
      kelas turunan.

KESIMPULAN:
Access modifier 'protected' dan 'private' berlaku untuk method (fungsi)
juga, tidak hanya properti (variabel). Method yang ingin dipanggil dari
luar kelas HARUS bersifat 'public'. Jika ingin tetap menggunakan
protected/private, maka harus dibuat method public sebagai perantara.

PERBAIKAN: Ubah access modifier method set_color dan set_weight menjadi public.
*/

class buah2
{
    public $nama;
    public $warna;
    public $bobot;

    // Diubah dari function ke public function
    public function set_name($n)
    {
        $this->nama = $n;
    }

    // DIPERBAIKI: diubah dari protected ke public
    public function set_color($n)
    {
        $this->warna = $n;
    }

    // DIPERBAIKI: diubah dari private ke public
    public function set_weight($n)
    {
        $this->bobot = $n;
    }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');   // SEKARANG BISA diakses (sudah public)
$mango->set_weight('300');     // SEKARANG BISA diakses (sudah public)

echo "Nama  : " . $mango->nama . "<br>";
echo "Warna : " . $mango->warna . "<br>";
echo "Bobot : " . $mango->bobot . " gram<br>";
?>
