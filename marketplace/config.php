<?php
// Подключение к MySQL
$host = "localhost";
$user = "root";
$pass = "123";          // твой пароль
$db   = "marketplace";  // имя БД

$connect = mysqli_connect($host, $user, $pass, $db);
if (!$connect) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8mb4");
session_start();
?>
