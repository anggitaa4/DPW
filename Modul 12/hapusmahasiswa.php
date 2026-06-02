<?php
  include("koneksi.php");

  if (isset($_GET["nim"])) {
    $db = new Database();
    $con = $db->getConnection();
    
    $npm = $_GET["nim"];

    $stmt = $con->prepare("DELETE FROM t_mahasiswa WHERE nim = ?");
    $stmt->bind_param("i", $nim);

    if (!$stmt->execute()) {
        die("Gagal menghapus data: " . $stmt->error);
    }
    
    $stmt->close();
    $con->close();
  }
  
  header("location:viewmahasiswa.php?msg=Data mahasiswa berhasil dihapus!");
?>