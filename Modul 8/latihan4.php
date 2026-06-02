<?php
$t = date(format: "H"); // mendapatkan jam dengan format 1-24
echo "If";
if ($t < 16) {
    echo "Selamat siang!";
}

$t = date(format: "H"); // mendapatkan jam dengan format 1-24
echo "<br> If dan Else <br>";
if ($t < 20) {
    echo "selamat siang!";
} else {
    echo "Selamat malam!";
}

echo "<br> Nested If <br>";
if ($t < 12) {
    echo "Selamat Pagi!";
} elseif ($t < 16) {
    echo "Selamat sore!";
} else {
    echo "Selamat Malam!";
}
?>