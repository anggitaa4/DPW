<?php
  include("koneksi.php");
  $db = new Database();
  $con = $db->getConnection();

  $search = "";
  if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY nim ASC");
      $searchParam = "%$search%";
      $stmt->bind_param("s", $searchParam);
  } else {
      $stmt = $con->prepare("SELECT * FROM t_mahasiswa ORDER BY nim ASC");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa (OOP) —SIAKAD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php"> Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mahasiswa (OOP)</h1>
        <p>Kelola data mahasiswa dengan implementasi Object-Oriented Programming</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmahasiswa.php">
                <input type="text" name="search" placeholder=" Cari berdasarkan nama mahasiswa..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmahasiswa.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $stmt->execute();
                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                      while ($data = $result->fetch_assoc())
                      {
                          echo "<tr>";
                          echo "<td>{$data['nim']}</td>";
                          echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          echo '<td class="action-links">
                              <a href="editmahasiswa.php?npm='.$data['nim'].'" class="btn btn-warning btn-sm"> Edit</a>
                              <a href="hapusmahasiswa.php?npm='.$data['nim'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')"> Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  }
                  
                  $stmt->close();
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