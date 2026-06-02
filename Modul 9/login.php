<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f0f2f5; }
        .login-box {
            background: white; padding: 30px; border-radius: 10px;
            max-width: 350px; margin: 60px auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 4px; color: #555; font-size: 14px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 8px; border: 1px solid #ccc;
            border-radius: 5px; box-sizing: border-box; font-size: 14px;
        }
        input[type="submit"] {
            width: 100%; padding: 10px; background: #4CAF50; color: white;
            border: none; border-radius: 5px; cursor: pointer; font-size: 15px;
        }
        input[type="submit"]:hover { background: #45a049; }
        .error { color: red; font-size: 11px; }
        .success { color: green; text-align: center; font-size: 14px; margin-top: 10px; }
        .exception-box {
            background: #fff3f3; border: 1px solid red; border-radius: 5px;
            padding: 10px; margin-top: 10px; font-size: 12px; color: darkred;
        }
    </style>
</head>
<body>
<?php
// === Task 3 & 8: Login dengan validasi, filter input, dan exception handling ===

// Akun valid (simulasi database)
$valid_users = [
    "admin"    => "admin123",
    "mahasiswa" => "pass123",
    "dosen"    => "dosen456",
];

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name       = $email = "";
$nameErr    = $emailErr = "";
$loginMsg   = "";
$exMsg      = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validasi username
        if (empty($_POST["u"])) {
            $nameErr = "masukkan username";
        } else {
            $name = bersihkan_input($_POST["u"]);
            if (!preg_match("/^[a-zA-Z0-9_]+$/", $name)) {
                throw new InvalidArgumentException("Username hanya boleh huruf, angka, dan underscore!");
            }
        }

        // Validasi password
        if (empty($_POST["p"])) {
            $emailErr = "masukkan password";
        } else {
            $email = bersihkan_input($_POST["p"]);
            if (strlen($email) < 6) {
                throw new LengthException("Password minimal 6 karakter!");
            }
        }

        // Proses login jika tidak ada error
        if (empty($nameErr) && empty($emailErr)) {
            if (array_key_exists($name, $valid_users) && $valid_users[$name] === $email) {
                // Simpan session (Task 7)
                session_start();
                $_SESSION["user"]    = $name;
                $_SESSION["login"]   = true;
                $loginMsg = "✓ Login berhasil! Selamat datang, <b>$name</b>.";
            } else {
                throw new RuntimeException("Username atau password salah!");
            }
        }

    } catch (InvalidArgumentException $e) {
        $exMsg = "Input Error: " . $e->getMessage();
    } catch (LengthException $e) {
        $exMsg = "Panjang Error: " . $e->getMessage();
    } catch (RuntimeException $e) {
        $exMsg = "Login Error: " . $e->getMessage();
    } catch (Exception $e) {
        $exMsg = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>

<div class="login-box">
    <h2> Login</h2>

    <?php if (!empty($loginMsg)): ?>
        <div class="success"><?= $loginMsg ?></div>
    <?php endif; ?>

    <?php if (!empty($exMsg)): ?>
        <div class="exception-box"> <?= htmlspecialchars($exMsg) ?></div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="u" value="<?= htmlspecialchars($name) ?>">
            <span class="error">* <?php echo $nameErr; ?></span>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="p">
            <span class="error">* <?php echo $emailErr; ?></span>
        </div>
        <input type="submit" value="Login">
    </form>

    <p style="font-size:11px; color:#aaa; text-align:center; margin-top:15px;">
        Akun test: admin / admin123
    </p>
</div>
</body>
</html>
