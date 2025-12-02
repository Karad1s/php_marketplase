<?php
require "config.php";
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, trim($_POST['username']));
    $password = $_POST['password'];

    if ($username === '' || $password === '') $error = "Заполните поля";
    else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($connect, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: login.php"); exit;
        } else {
            $error = "Пользователь уже существует";
        }
    }
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Регистрация</title><link rel="stylesheet" href="styles.css"></head>
<body>
<div class="header">
  <div class="brand"><img src="https://via.placeholder.com/90x26?text=Logo" alt="logo"></div>
  <div class="search"><input placeholder="Поиск товара..."></div>
  <div class="user"></div>
</div>

<div class="container" style="display:flex;justify-content:center;align-items:flex-start">
  <div style="width:360px;background:#fff;padding:26px;border-radius:8px;box-shadow:0 12px 30px rgba(11,21,34,0.06);margin-top:40px">
    <h2>Регистрация</h2>
    <?php if($error) echo "<div style='color:#c92a1f;margin-bottom:10px'>$error</div>"; ?>
    <form method="post">
      <input name="username" placeholder="Логин" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button style="width:100%;background:#0b6fb6;color:#fff;padding:12px;border-radius:8px;border:none;cursor:pointer">Создать аккаунт</button>
    </form>
    <p style="margin-top:12px;text-align:center"><a href="login.php">Войти</a></p>
  </div>
</div>
</body></html>
