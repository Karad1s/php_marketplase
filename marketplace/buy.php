<?php
require "config.php";
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) { header("Location: index.php"); exit; }

$id = intval($_POST['id']);
$amount = intval($_POST['amount']);
if ($amount <= 0) { header("Location: index.php"); exit; }

$stmt = mysqli_prepare($connect, "SELECT quantity FROM products WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $qty);
if (!mysqli_stmt_fetch($stmt)) { mysqli_stmt_close($stmt); die("Товар не найден"); }
mysqli_stmt_close($stmt);

if ($qty < $amount) { die("Недостаточно товара"); }

$new = $qty - $amount;
$stmt = mysqli_prepare($connect, "UPDATE products SET quantity = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ii", $new, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($connect, "INSERT INTO orders (user_id, product_id, amount) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iii", $_SESSION['user_id'], $id, $amount);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: index.php");
exit;
?>
