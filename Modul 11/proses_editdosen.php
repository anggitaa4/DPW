<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $id        = intval($_POST['idDosen']);
    $namaDosen = mysqli_real_escape_string($link, trim($_POST['namaDosen']));
    $noHP      = mysqli_real_escape_string($link, trim($_POST['noHP']));

    $query  = "UPDATE t_dosen SET namaDosen = '$namaDosen', noHP = '$noHP' WHERE idDosen = '$id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    header("location:viewdosen.php?success=1");
    exit;
} else {
    header("location:viewdosen.php");
    exit;
}
?>