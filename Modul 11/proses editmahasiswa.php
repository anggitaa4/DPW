<?php
if (isset($_POST['edit'])) {
    include 'koneksi.php';
 
    $nim     = intval($_POST['npm']);
    $namaMhs = mysqli_real_escape_string($link, trim($_POST['namaMhs']));
    $prodi   = mysqli_real_escape_string($link, trim($_POST['prodi']));
    $alamat  = mysqli_real_escape_string($link, trim($_POST['alamat']));
    $noHP    = mysqli_real_escape_string($link, trim($_POST['noHP']));
 
    $query  = "UPDATE t_mahasiswa SET namaMhs='$namaMhs', prodi='$prodi', alamat='$alamat', noHP='$noHP' WHERE nim='$nim'";
    $result = mysqli_query($link, $query);
 
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}
 
header("location:viewmahasiswa.php?success=1");
exit;
?>
 