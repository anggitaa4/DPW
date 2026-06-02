<?php
  include("koneksi.php");
  
  if (isset($_POST["tambah"])) {
    $db = new Database();
    $con = $db->getConnection();

    $kodeMK = $_POST["kodeMK"];
    $namaMK = $_POST["namaMK"];
    $sks = $_POST["sks"];
    // Variabel $jam dihapus karena di tabel database lama tidak ada kolom jam

    // DISESUAIKAN: Mengubah nama kolom menjadi kode_mk, nama_mk, sks (sesuai tabel lamamu)
    // Serta mengurangi satu placeholder (?) karena kolom jam ditiadakan
    $stmt = $con->prepare("INSERT INTO t_matakuliah (kode_mk, nama_mk, sks) VALUES (?, ?, ?)");
    
    // DISESUAIKAN: bind_param diubah menjadi "isi" (integer, string, integer)
    $stmt->bind_param("isi", $kodeMK, $namaMK, $sks);

    if (!$stmt->execute()) {
        die("Gagal menambah data: " . $stmt->error);
    }
    
    $stmt->close();
    $con->close();
  }

  header("location:viewmatakuliah.php?msg=Data mata kuliah berhasil ditambahkan!");
?>