<?php
  include("koneksi.php");
  
  if (isset($_POST["tambah"])) {
    $db = new Database();
    $con = $db->getConnection();

    // Menangkap data dari form inputmahasiswa.php
    $npm = $_POST["nim"];
    $namaMhs = $_POST["namaMhs"];
    $prodi = $_POST["prodi"];
    $alamat = $_POST["alamat"];
    $noHP = $_POST["noHP"];

    // Menggunakan Prepared Statement dengan 5 parameter (?) sesuai jumlah kolom t_mahasiswa
    $stmt = $con->prepare("INSERT INTO t_mahasiswa (nim, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    
    // "issss" artinya: i = integer (npm), s = string (namaMhs, prodi, alamat, noHP)
    $stmt->bind_param("issss", $nim, $namaMhs, $prodi, $alamat, $noHP);

    if (!$stmt->execute()) {
        die("Gagal menambah data mahasiswa: " . $stmt->error);
    }
    
    $stmt->close();
    $con->close();
  }

  header("location:viewmahasiswa.php?msg=Data mahasiswa berhasil ditambahkan!");
?>