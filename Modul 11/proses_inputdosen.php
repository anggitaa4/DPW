<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

    // pastikan input tidak undefined
    $namaDosen = isset($_POST['namaDosen']) ? mysqli_real_escape_string($link, trim($_POST['namaDosen'])) : '';
    $noHP      = isset($_POST['noHP']) ? mysqli_real_escape_string($link, trim($_POST['noHP'])) : '';

    // validasi ringan supaya tidak insert kosong
    if ($namaDosen != "" && $noHP != "") {

        $query = "INSERT INTO t_dosen (namaDosen, noHP) 
                  VALUES ('$namaDosen', '$noHP')";

        $result = mysqli_query($link, $query);

        if (!$result) {
            die("Gagal simpan data: " . mysqli_error($link));
        }

        header("location:viewdosen.php?success=1");
        exit;

    } else {
        header("location:viewdosen.php?error=empty");
        exit;
    }

} else {
    header("location:viewdosen.php");
    exit;
}
?>