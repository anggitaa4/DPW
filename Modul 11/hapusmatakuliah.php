<?php
include 'koneksi.php';
 
if (isset($_GET['kodeMK'])) {
    $kode        = intval($_GET['kodeMK']);
    $query       = "DELETE FROM t_matakuliah WHERE kodeMK='$kode'";
    $hasil_query = mysqli_query($link, $query);
 
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}
 
header("location:viewmatakuliah.php?deleted=1");
exit;
?>
 