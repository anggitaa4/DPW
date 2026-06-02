<?php
include 'koneksi.php';

if (isset($_POST['input'])) {

    $nim     = mysqli_real_escape_string($link, trim($_POST['nim']));
    $namaMhs = mysqli_real_escape_string($link, trim($_POST['namaMhs']));
    $prodi   = mysqli_real_escape_string($link, trim($_POST['prodi']));   // ✅ tambah ini
    $alamat  = mysqli_real_escape_string($link, trim($_POST['alamat']));  // ✅ tambah ini
    $noHP    = mysqli_real_escape_string($link, trim($_POST['noHP']));

    if ($nim != "" && $namaMhs != "" && $noHP != "") {

        $cek = mysqli_query($link, "SELECT * FROM t_mahasiswa WHERE nim='$nim'");

        if (mysqli_num_rows($cek) == 0) {

    
            $query = "INSERT INTO t_mahasiswa (nim, namaMhs, prodi, alamat, noHP) 
                      VALUES ('$nim', '$namaMhs', '$prodi', '$alamat', '$noHP')";

            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Query Error: " . mysqli_error($link));
            }
        }

        header("location:viewmahasiswa.php?success=1");
        exit;

    } else {
        header("location:inputmahasiswa.php?error=empty");
        exit;
    }

} else {
    header("location:viewmahasiswa.php");
    exit;
}
?>