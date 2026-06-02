<?php
include("koneksi.php");

if (isset($_POST["edit"])) {
    $db = new Database();
    $con = $db->getConnection();

    $kode_mk = $_POST["kodeMK"];
    $nama_mk = $_POST["namaMK"];
    $sks     = $_POST["sks"];

    $stmt = $con->prepare("UPDATE t_matakuliah SET nama_matkul = ?, sks = ? WHERE kode_matkul = ?");
    
    $stmt->bind_param("sii", $nama_matkul, $sks, $kode_matkul);

    if (!$stmt->execute()) {
        die("Gagal memperbarui data di database: " . $stmt->error);
    }
    
    $stmt->close();
    $con->close();
}

header("location:viewmatakuliah.php?msg=Data mata kuliah berhasil diperbarui!");
exit();
?>