<?php
include 'koneksi.php';

$keyword = isset($_GET['keyword']) 
    ? mysqli_real_escape_string($link, trim($_GET['keyword'])) 
    : '';

if (isset($_GET['show'])) {

    if ($keyword !== '') {

        $query = "SELECT * FROM t_dosen 
                  WHERE namaDosen LIKE '%$keyword%' 
                  ORDER BY idDosen ASC";

    } else {

        $query = "SELECT * FROM t_dosen 
                  ORDER BY idDosen ASC";
    }

} else {

    $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
}

$result = mysqli_query($link, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
}

$total = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen - SisInfoKampus</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container">

    <div class="card">

        <h1>
            Tabel <span>Dosen</span>
        </h1>

        <p class="page-subtitle">
            Kelola data seluruh dosen
        </p>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                Data berhasil disimpan!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['deleted'])): ?>
            <div class="alert alert-success">
                Data berhasil dihapus!
            </div>
        <?php endif; ?>

        <div class="actions-bar">

            <a href="input.php" class="btn btn-primary">
                Tambah Dosen
            </a>

            <form class="search-form" method="GET" action="viewdosen.php">

                <input type="hidden" name="show" value="1">

                <input type="text"
                       name="keyword"
                       placeholder="Cari nama dosen..."
                       value="<?= htmlspecialchars($keyword) ?>">

                <button type="submit" class="btn btn-primary">
                    Cari
                </button>

                <?php if ($keyword): ?>
                    <a href="viewdosen.php?show=1" class="btn btn-secondary">
                        Reset
                    </a>
                <?php endif; ?>

            </form>

        </div>

        <?php if ($keyword): ?>
            <p class="search-result-info">
                Menampilkan <span><?= $total ?></span> hasil untuk:
                "<span><?= htmlspecialchars($keyword) ?></span>"
            </p>
        <?php endif; ?>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>

                <tbody>

                <?php if ($total > 0): ?>

                    <?php while ($data = mysqli_fetch_assoc($result)): ?>

                        <tr>
                            <td>
                                <span class="badge-id">
                                    <?= htmlspecialchars($data['idDosen']) ?>
                                </span>
                            </td>

                            <td>
                                <?= htmlspecialchars($data['namaDosen']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($data['noHP']) ?>
                            </td>

                            <td>
                                <div class="action-buttons">

                                    <a href="editdosen.php?idDosen=<?= $data['idDosen'] ?>"
                                       class="btn btn-warning">
                                        Edit
                                    </a>

                                    <a href="hapusdosen.php?idDosen=<?= $data['idDosen'] ?>"
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        Hapus
                                    </a>

                                </div>
                            </td>
                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="4" class="no-data">
                            Tidak ada data dosen ditemukan.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>