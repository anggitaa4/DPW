<?php
$x = 5;
$y = 10;

echo "Penambahan " . $x + $y . "<br>";
echo "Pengurangan " . $x - $y . "<br>";
echo "Perkalian " . $x * $y . "<br>";
echo "Pembagian " . $x / $y . "<br>";
echo "Modulus " . $x % $y . "<br>";
echo "Exponensial " . $x ** $y . "<br>";
echo("<br>");

$x += 2; //  $x = $x + 2
$y *= 2; //  $y = $y * 2
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo("<br>");

$x = 5;
$y = 10;

echo "Isi ++x = " . ++$x . "<br>";
echo "Isi x++ = " . $x++ . "<br>";
echo "Isi x = " . $x . "<br>";
echo("<br>");

echo "Isi --y = " . --$y . "<br>";
echo "Isi y-- = " . $y-- . "<br>";
echo "Isi y = " . $y . "<br>";
echo("<br>");

$user = "Andi darmawan";
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo $status . "<br>";
echo $color = $color ?? "red";

?>

<!--
Jawaban: Perbedaan $x++ dan ++$x
- $x++ (Post-increment): Nilai $x digunakan/ditampilkan TERLEBIH DAHULU, baru kemudian nilainya bertambah 1.
  Contoh: jika $x = 5, maka echo $x++ akan menampilkan 5, lalu $x menjadi 6.

- ++$x (Pre-increment): Nilai $x ditambah 1 TERLEBIH DAHULU, baru kemudian nilainya digunakan/ditampilkan.
  Contoh: jika $x = 5, maka echo ++$x akan menampilkan 6, dan $x menjadi 6.
-->