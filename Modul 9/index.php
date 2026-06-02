<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 9 - PHP Lanjut</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', Arial, sans-serif; background: #0f172a; min-height: 100vh; color: #e2e8f0; }

    /* HEADER */
    header { background: linear-gradient(135deg, #1e3a5f 0%, #0f172a 100%); border-bottom: 2px solid #334155; padding: 30px 40px; display: flex; align-items: center; gap: 20px; }
    .modul-badge { background: #3b82f6; color: white; font-size: 36px; font-weight: 900; width: 70px; height: 70px; border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 15px rgba(59,130,246,0.4); }
    header h1 { font-size: 26px; color: #f1f5f9; }
    header p { font-size: 13px; color: #94a3b8; margin-top: 4px; }

    /* MAIN */
    main { max-width: 960px; margin: 40px auto; padding: 0 20px 60px; }

    /* INFO BAR */
    .info-bar { background: #1e293b; border: 1px solid #334155; border-radius: 10px; padding: 16px 20px; display: flex; gap: 30px; flex-wrap: wrap; margin-bottom: 24px; }
    .info-item { font-size: 13px; color: #94a3b8; }
    .info-item b { color: #f1f5f9; }

    /* ONE BIG GRID */
    .grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }

    /* CARDS */
    .card { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 20px; text-decoration: none; color: inherit; display: flex; flex-direction: column; gap: 10px; transition: transform 0.2s, border-color 0.2s; position: relative; overflow: hidden; }
    .card:hover { transform: translateY(-3px); border-color: #3b82f6; }
    .card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: 12px 12px 0 0; }

    /* Warna aksen per kategori */
    .card.blue::before   { background: #3b82f6; }
    .card.green::before  { background: #22c55e; }
    .card.orange::before { background: #f97316; }
    .card.purple::before { background: #a855f7; }
    .card.pink::before   { background: #ec4899; }
    .card.teal::before   { background: #14b8a6; }
    .card.yellow::before { background: #eab308; }

    .card-header { display: flex; align-items: center; gap: 12px; }
    .icon { font-size: 22px; font-weight: 800; color: #f1f5f9; width: 48px; height: 48px; background: #0f172a; border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .card-num { font-size: 10px; font-weight: 700; letter-spacing: 1px; color: #64748b; text-transform: uppercase; }
    .card-title { font-size: 15px; font-weight: 600; color: #f1f5f9; margin-top: 2px; }
    .card-desc { font-size: 12px; color: #94a3b8; line-height: 1.6; }
    .card-files { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 4px; }
    .file-tag { background: #0f172a; border: 1px solid #334155; border-radius: 5px; font-size: 10px; color: #64748b; padding: 2px 8px; font-family: monospace; }
    .arrow { margin-left: auto; color: #475569; font-size: 18px; align-self: flex-end; transition: color 0.2s; }
    .card:hover .arrow { color: #3b82f6; }

    /* FOOTER */
    footer { text-align: center; color: #475569; font-size: 12px; margin-top: 20px; }
  </style>
</head>
<body>
  <header>
    <div class="modul-badge">9</div>
    <div>
      <h1>PHP Lanjut</h1>
      <p>Praktikum 9 — Form Handling · File Upload · Session · Cookies · Exception · JSON</p>
    </div>
  </header>

  <main>
    <!-- Info Bar -->
    <div class="info-bar">
      <div class="info-item"><b>Folder:</b> php_lanjut/</div>
      <div class="info-item"><b>Total File:</b> 9 file</div>
      <div class="info-item"><b>Upload Folder:</b> gambar/</div>
      <div class="info-item"><b>Modul:</b> Semester Genap</div>
    </div>

    <!-- SATU GRID UNTUK SEMUA KARTU -->
    <div class="grid">

      <a href="form_pendaftaran.html" class="card blue">
        <div class="card-header">
          <div class="icon">1</div>
          <div>
            <div class="card-num">Tugas 1</div>
            <div class="card-title">Form Pendaftaran</div>
          </div>
        </div>
        <div class="card-desc">Form HTML dengan field NIM, nama, email, TTL, alamat, dan gender. Dikirim via metode POST.</div>
        <div class="card-files">
          <span class="file-tag">form_pendaftaran.html</span>
          <span class="file-tag">proses_pendaftaran.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="form_komentar.php" class="card green">
        <div class="card-header">
          <div class="icon">2</div>
          <div>
            <div class="card-num">Tugas 2</div>
            <div class="card-title">Form Komentar + Filter XSS</div>
          </div>
        </div>
        <div class="card-desc">Form komentar self-submit dengan fungsi bersihkan_input() untuk mencegah serangan XSS dan injeksi HTML.</div>
        <div class="card-files">
          <span class="file-tag">form_komentar.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="login.php" class="card orange">
        <div class="card-header">
          <div class="icon">3</div>
          <div>
            <div class="card-num">Tugas 3</div>
            <div class="card-title">Form Login + Validasi</div>
          </div>
        </div>
        <div class="card-desc">Form login dengan validasi setiap input, pesan error warna merah, filter input, dan exception handling.</div>
        <div class="card-files">
          <span class="file-tag">login.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="upload_gambar.php" class="card purple">
        <div class="card-header">
          <div class="icon">4</div>
          <div>
            <div class="card-num">Tugas 4</div>
            <div class="card-title">Upload Gambar</div>
          </div>
        </div>
        <div class="card-desc">Upload file gambar dengan 5 validasi: cek tipe gambar, duplikat nama, ukuran max 500KB, filter format JPG/PNG/GIF/JPEG.</div>
        <div class="card-files">
          <span class="file-tag">upload_gambar.php</span>
          <span class="file-tag">gambar/</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="galery.php" class="card pink">
        <div class="card-header">
          <div class="icon">5</div>
          <div>
            <div class="card-num">Tugas 5</div>
            <div class="card-title">Galeri Gambar</div>
          </div>
        </div>
        <div class="card-desc">Menampilkan seluruh gambar dari folder gambar/ dalam tampilan galeri grid menggunakan glob().</div>
        <div class="card-files">
          <span class="file-tag">galery.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="cookies.php" class="card teal">
        <div class="card-header">
          <div class="icon">6</div>
          <div>
            <div class="card-num">Tugas 6</div>
            <div class="card-title">Cookies</div>
          </div>
        </div>
        <div class="card-desc">Menyimpan data identitas (NIM, nama, email) ke cookies browser selama 7 hari. Bisa dihapus kapan saja.</div>
        <div class="card-files">
          <span class="file-tag">cookies.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="session_login.php" class="card yellow">
        <div class="card-header">
          <div class="icon">7</div>
          <div>
            <div class="card-num">Tugas 7 & 8</div>
            <div class="card-title">Session Login + Exception</div>
          </div>
        </div>
        <div class="card-desc">Sistem login menggunakan $_SESSION. Setelah login menampilkan info user & session ID. Dilengkapi try-catch exception handling.</div>
        <div class="card-files">
          <span class="file-tag">session_login.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

      <a href="json_array.php" class="card blue">
        <div class="card-header">
          <div class="icon">9</div>
          <div>
            <div class="card-num">Tugas 9</div>
            <div class="card-title">Array ke JSON</div>
          </div>
        </div>
        <div class="card-desc">Array 15 data mahasiswa (nama & umur) dikonversi ke JSON dengan json_encode(), ditampilkan, lalu di-decode kembali dengan json_decode().</div>
        <div class="card-files">
          <span class="file-tag">json_array.php</span>
        </div>
        <span class="arrow">→</span>
      </a>

    </div>

    <footer>
      <p>Praktikum 9 — PHP Lanjut &nbsp;|&nbsp; Web Dinamis Berbasis PHP</p>
    </footer>
  </main>
</body>
</html>
