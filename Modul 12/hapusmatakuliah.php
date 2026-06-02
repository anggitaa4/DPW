<?php
  include("koneksi.php");

  // DISESUAIKAN: Menangkap kode_mk dari URL (bisa kodeMK atau kode_mk)
  $kodeMK = $_GET["kodeMK"] ?? $_GET["kode_matkul"] ?? '';

  if (!empty($kodeMK)) {
    $db = new Database();
    $con = $db->getConnection();
    
    // DISESUAIKAN: Mengubah kodeMK menjadi kode_mk sesuai database laptopmu
    $stmt = $con->prepare("DELETE FROM t_matakuliah WHERE kode_matkul= ?");
    $stmt->bind_param("i", $kodeMK);

    if (!$stmt->execute()) {
        die("Gagal menghapus data: " . $stmt->error);
    }
    
    $stmt->close();
    $con->close();
  }
  
  header("location:viewmatakuliah.php?msg=Data mata kuliah berhasil dihapus!");
?>