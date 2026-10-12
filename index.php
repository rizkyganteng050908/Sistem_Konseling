<?php
require_once 'data.php';

$error = '';
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $found = false;
    foreach ($_SESSION['users'] as $usr) {
        if ($usr['username'] == $username && $usr['password'] == $password) {
            $_SESSION['login_user'] = $usr;
            $found = true;
            header("location: dashboard.php");
            exit();
        }
    }
    if (!$found) {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Informasi Konseling</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 350px; }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #666; }
        input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; border: none; color: white; border-radius: 4px; font-weight: bold; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 14px; text-align: center; margin-bottom: 10px; }
        .hint { font-size: 12px; color: #771212; margin-top: 15px; background: #fff3f3; padding: 8px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login Sistem</h2>
        <?php if (!empty($error)) { echo "<div class='error'>$error</div>"; } ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login">LOGIN</button>
        </form>
        <div class="hint">
            <b>Akun Demo:</b><br>
            - Guru BK: username <code>bk</code> | pass <code>123</code><br>
            - Siswa: username <code>andi</code> | pass <code>123</code>
        </div>
    </div>
</body>
</html>
