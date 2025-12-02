<?php
require "config.php";
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, trim($_POST['username']));
    $password = $_POST['password'];

    $stmt = mysqli_prepare($connect, "SELECT id, password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $hash);
    if (mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: index.php"); exit;
        } else {
            $error = "Неверный логин или пароль";
        }
    } else {
        $error = "Неверный логин или пароль";
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Войти — Магазин</title><link rel="stylesheet" href="styles.css"></head>
<body>
<div class="header">
  <div class="brand"><img src="https://via.placeholder.com/90x26?text=Logo" alt="logo"></div>
  <div class="search"><input placeholder="Поиск товара..."></div>
  <div class="user"></div>
</div>

<div class="container" style="display:flex;justify-content:center;align-items:flex-start">
  <div style="width:360px;background:#fff;padding:26px;border-radius:8px;box-shadow:0 12px 30px rgba(11,21,34,0.06);margin-top:40px">
    <h2 style="margin:0 0 10px">Войти</h2>
    <?php if($error) echo "<div style='color:#c92a1f;margin-bottom:10px'>$error</div>"; ?>
    <form method="post">
      <input name="username" placeholder="Логин" style="width:100%;padding:10px;margin-bottom:10px;border-radius:6px;border:1px solid #e6e8ea" required>
      <input type="password" name="password" placeholder="Пароль" style="width:100%;padding:10px;margin-bottom:12px;border-radius:6px;border:1px solid #e6e8ea" required>
      <button style="width:100%;background:#0b6fb6;color:#fff;padding:12px;border-radius:8px;border:none;cursor:pointer">Войти</button>
    </form>
    <p style="margin-top:12px;text-align:center">Нет аккаунта? <a href="register.php">Регистрация</a></p>
  </div>
</div>
</body>
</html>
