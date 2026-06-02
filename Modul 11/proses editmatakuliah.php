<?php
if (isset($_POST['edit'])) {
    include 'koneksi.php';
 
    $kodeMK = intval($_POST['kodeMK']);
    $namaMK = mysqli_real_escape_string($link, trim($_POST['namaMK']));
    $sks    = intval($_POST['sks']);
    $jam    = intval($_POST['jam']);
 
    $query  = "UPDATE t_matakuliah SET namaMK='$namaMK', sks='$sks', jam='$jam' WHERE kodeMK='$kodeMK'";
    $result = mysqli_query($link, $query);
 
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}
 
header("location:viewmatakuliah.php?success=1");
exit;
?>