<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

    $kodeMK = mysqli_real_escape_string($link, trim($_POST['kode_matkul']));
    $namaMK = mysqli_real_escape_string($link, trim($_POST['nama_matkul']));
    $sks    = mysqli_real_escape_string($link, trim($_POST['sks']));
    $jam    = mysqli_real_escape_string($link, trim($_POST['jam']));

    $cek = mysqli_query($link, "SELECT * FROM t_matakuliah WHERE kode_matkul='$kode_matkul'");

    if (mysqli_num_rows($cek) > 0) {
        header("location:inputmatakuliah.php?error=duplikat");
        exit;
    }

    $query = "INSERT INTO t_matakuliah (kode_matkul, nama_matkul, sks, jam)
              VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";

    $result = mysqli_query($link, $query);

    if ($result) {
        header("location:viewmatakuliah.php?show=1&success=1");
        exit;
    } else {
        die("Query gagal: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

} else {
    header("location:inputmatakuliah.php");
    exit;
}
?>