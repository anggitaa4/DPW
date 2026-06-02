<?php
include 'koneksi.php';

if (!isset($_GET['nim']) || $_GET['nim'] == '') {
    header("location:viewmahasiswa.php");
    exit;
}

$nim = mysqli_real_escape_string($link, $_GET['nim']);

$query = "SELECT * FROM t_mahasiswa WHERE nim='$nim'";
$result = mysqli_query($link, $query);

if (!$result) {
    die(mysqli_error($link));
}

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan");
}
?>