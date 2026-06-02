<?php
session_start();

// Akun valid (simulasi database)
$valid_users = [
    "admin"     => "admin123",
    "mahasiswa" => "pass123",
    "dosen"     => "dosen456",
];

$nameErr = $passErr = $loginMsg = $errMsg = "";

// Proses logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: session_login.php");
    exit;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = trim(htmlspecialchars($_POST["username"] ?? ""));
        $password = trim(htmlspecialchars($_POST["password"] ?? ""));

        if (empty($username)) {
            throw new InvalidArgumentException("Username tidak boleh kosong!");
        }
        if (empty($password)) {
            throw new InvalidArgumentException("Password tidak boleh kosong!");
        }
        if (!array_key_exists($username, $valid_users)) {
            throw new RuntimeException("Username tidak ditemukan!");
        }
        if ($valid_users[$username] !== $password) {
            throw new RuntimeException("Password salah!");
        }

        // Login sukses — simpan session
        $_SESSION["user"]      = $username;
        $_SESSION["login"]     = true;
        $_SESSION["login_time"] = date("H:i:s d-m-Y");

    } catch (InvalidArgumentException $e) {
        $errMsg = "Validasi: " . $e->getMessage();
    } catch (RuntimeException $e) {
        $errMsg = "Login gagal: " . $e->getMessage();
    } catch (Exception $e) {
        $errMsg = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Session</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #e8eaf6; }
        .card {
            background: white; max-width: 380px; margin: 70px auto;
            padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        }
        h2 { text-align: center; color: #3f51b5; margin-bottom: 20px; }
        label { font-size: 13px; color: #555; display: block; margin-bottom: 4px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 9px; border: 1px solid #ccc;
            border-radius: 6px; box-sizing: border-box; margin-bottom: 14px; font-size: 14px;
        }
        input[type="submit"] {
            width: 100%; padding: 10px; background: #3f51b5; color: white;
            border: none; border-radius: 6px; cursor: pointer; font-size: 15px;
        }
        input[type="submit"]:hover { background: #303f9f; }
        .error-box {
            background: #ffebee; border-left: 4px solid #f44336;
            padding: 10px 14px; border-radius: 5px; margin-bottom: 14px;
            font-size: 13px; color: #c62828;
        }
        .success-box {
            background: #e8f5e9; border-left: 4px solid #4CAF50;
            padding: 15px; border-radius: 6px; font-size: 14px;
        }
        .hint { font-size: 11px; color: #aaa; text-align: center; margin-top: 12px; }
        .logout-btn {
            display: inline-block; margin-top: 12px; padding: 8px 18px;
            background: #f44336; color: white; text-decoration: none; border-radius: 5px; font-size: 13px;
        }
        .session-info { background: #f3f4ff; padding: 12px; border-radius: 6px; margin-top: 10px; font-size: 13px; }
    </style>
</head>
<body>
<div class="card">
    <h2> Login (Session)</h2>

    <?php if (isset($_SESSION["login"]) && $_SESSION["login"] === true): ?>
        <!-- Halaman setelah login berhasil -->
        <div class="success-box">
            <b>Anda sudah login!</b>
        </div>
        <div class="session-info">
            <b>User:</b> <?= htmlspecialchars($_SESSION["user"]) ?><br>
            <b>Login sejak:</b> <?= $_SESSION["login_time"] ?><br>
            <b>Session ID:</b> <code><?= session_id() ?></code>
        </div>
        <a href="?logout=1" class="logout-btn"> Logout</a>

    <?php else: ?>
        <!-- Form login -->
        <?php if (!empty($errMsg)): ?>
            <div class="error-box"> <?= htmlspecialchars($errMsg) ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Masukkan username">

            <label>Password:</label>
            <input type="password" name="password" placeholder="Masukkan password">

            <input type="submit" value="Login">
        </form>
        <p class="hint">Akun tersedia: admin/admin123 | mahasiswa/pass123 | dosen/dosen456</p>
    <?php endif; ?>
</div>
</body>
</html>
