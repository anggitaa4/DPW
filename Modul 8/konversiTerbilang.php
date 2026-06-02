<?php
$angka = 7; 

echo "<h2>Konversi Angka ke Terbilang</h2>";
echo "<p>Angka: $angka</p>";

switch ($angka) {
    case 1:
        $terbilang = "satu";
        break;
    case 2:
        $terbilang = "dua";
        break;
    case 3:
        $terbilang = "tiga";
        break;
    case 4:
        $terbilang = "empat";
        break;
    case 5:
        $terbilang = "lima";
        break;
    case 6:
        $terbilang = "enam";
        break;
    case 7:
        $terbilang = "tujuh";
        break;
    case 8:
        $terbilang = "delapan";
        break;
    case 9:
        $terbilang = "sembilan";
        break;
    default:
        $terbilang = "Angka tidak dikenali (masukkan angka 1-9)";
}

echo "<p><strong>Terbilang: $terbilang</strong></p>";

echo "<hr>";
echo "<h3>Daftar Konversi 1-9</h3>";
for ($i = 1; $i <= 9; $i++) {
    switch ($i) {
        case 1: $kata = "satu"; break;
        case 2: $kata = "dua"; break;
        case 3: $kata = "tiga"; break;
        case 4: $kata = "empat"; break;
        case 5: $kata = "lima"; break;
        case 6: $kata = "enam"; break;
        case 7: $kata = "tujuh"; break;
        case 8: $kata = "delapan"; break;
        case 9: $kata = "sembilan"; break;
    }
    echo "<p>$i = $kata</p>";
}
?>