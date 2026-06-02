<?php

$siswa = array(
    array("no" => 1, "poin" => 75,  "nama" => "Adi"),
    array("no" => 2, "poin" => 80,  "nama" => "Joni"),
    array("no" => 3, "poin" => 65,  "nama" => "Jihan"),
    array("no" => 4, "poin" => 70,  "nama" => "Aya"),
    array("no" => 5, "poin" => 85,  "nama" => "Ita"),
    array("no" => 6, "poin" => 90,  "nama" => "Budi"),
    array("no" => 7, "poin" => 95,  "nama" => "Tini"),
    array("no" => 8, "poin" => 65,  "nama" => "Sari"),
);

echo "<h2>Data Nilai Siswa</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>No Urut</th><th>Poin</th><th>Nama</th></tr>";
foreach ($siswa as $s) {
    echo "<tr><td>{$s['no']}</td><td>{$s['poin']}</td><td>{$s['nama']}</td></tr>";
}
echo "</table>";

// a) Tampilkan poin siswa dengan nomor urut 5
echo "<br><h3>a) Poin siswa nomor urut 5:</h3>";
echo "<p>Nama: {$siswa[4]['nama']}, Poin: {$siswa[4]['poin']}</p>";

// b) Tampilkan semua nama siswa yang memiliki poin 90
echo "<h3>b) Siswa dengan poin 90:</h3>";
$ada = false;
for ($i = 0; $i < count($siswa); $i++) {
    if ($siswa[$i]['poin'] == 90) {
        echo "<p>" . $siswa[$i]['nama'] . "</p>";
        $ada = true;
    }
}
if (!$ada) {
    echo "<p>Tidak ada siswa dengan poin 90</p>";
}

// c) Tampilkan semua nama siswa yang memiliki poin 100
echo "<h3>c) Siswa dengan poin 100:</h3>";
$ada = false;
for ($i = 0; $i < count($siswa); $i++) {
    if ($siswa[$i]['poin'] == 100) {
        echo "<p>" . $siswa[$i]['nama'] . "</p>";
        $ada = true;
    }
}
if (!$ada) {
    echo "<p>Tidak ada siswa dengan poin 100</p>";
}
?>