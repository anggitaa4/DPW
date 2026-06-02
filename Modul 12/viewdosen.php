<?php
  include("koneksi.php");
  $db = new Database();
  $con = $db->getConnection();

  $search = "";
  
  if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      // Jika error "Unknown column", ubah namaDosen di bawah ini menjadi nama_dosen
      $stmt = $con->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC");
      if(!$stmt) {
          // Cadangan jika nama kolom di database ternyata nama_dosen
          $stmt = $con->prepare("SELECT * FROM t_dosen WHERE nama_dosen LIKE ? ORDER BY idDosen ASC");
      }
      $searchParam = "%$search%";
      $stmt->bind_param("s", $searchParam);
  } else {
      $stmt = $con->prepare("SELECT * FROM t_dosen ORDER BY idDosen ASC");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Dosen (OOP)</h1>
        <p>Kelola data dosen dengan implementasi Object-Oriented Programming</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewdosen.php">
                <input type="text" name="search" placeholder="Cari berdasarkan nama dosen..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputdosen.php" class="btn btn-primary">+ Tambah Dosen</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dosen</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  if ($stmt) {
                      $stmt->execute();
                      $result = $stmt->get_result();

                      if ($result && $result->num_rows > 0) {
                          while ($data = $result->fetch_assoc())
                          {
                              // Mengatasi variasi nama kolom namaDosen / nama_dosen
                              $nama_tampil = $data['namaDosen'] ?? $data['nama_dosen'] ?? '';
                              // Mengatasi variasi nama kolom noHp / noHP / no_hp
                              $hp_tampil = $data['noHp'] ?? $data['noHP'] ?? $data['no_hp'] ?? '';

                              echo "<tr>";
                              echo "<td>{$data['idDosen']}</td>";
                              echo "<td>" . htmlspecialchars($nama_tampil) . "</td>";
                              echo "<td>" . htmlspecialchars($hp_tampil) . "</td>";
                              echo '<td class="action-links">
                                  <a href="editdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-warning btn-sm"> Edit</a>
                                  <a href="hapusdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-danger btn-sm"
                                      onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                              </td>';
                              echo "</tr>";
                          }
                      } else {
                          echo '<tr><td colspan="4"><div class="empty-state"><div class="icon"></div><p>Belum ada data dosen' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
                      }
                      $stmt->close();
                  } else {
                      echo '<tr><td colspan="4"><div class="alert alert-danger">Error: Gagal memuat kueri database. Periksa kembali nama kolom Anda.</div></td></tr>';
                  }
                  $con->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>