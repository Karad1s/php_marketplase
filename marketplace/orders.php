<?php
require "config.php";
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$res = mysqli_query($connect, "SELECT o.id,o.amount,o.created_at,p.name,u.username FROM orders o JOIN products p ON p.id=o.product_id JOIN users u ON u.id=o.user_id ORDER BY o.created_at DESC");
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Заказы</title><link rel="stylesheet" href="styles.css"></head>
<body>
<div class="header">
  <div class="brand"><img src="https://via.placeholder.com/90x26?text=Logo"></div>
  <div class="search"><input placeholder="Поиск товара..."></div>
  <div class="user">Привет, <?=htmlspecialchars($_SESSION['username'])?> — <a href="logout.php">Выйти</a></div>
</div>

<div class="container">
  <h2>Список заказов</h2>
  <table style="width:100%;border-collapse:collapse">
    <thead>
      <tr style="text-align:left;border-bottom:1px solid #e6e8ea">
        <th>#</th><th>Пользователь</th><th>Товар</th><th>Кол-во</th><th>Дата</th>
      </tr>
    </thead>
    <tbody>
      <?php while($r = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td style="padding:8px 4px;border-bottom:1px solid #f1f5f9"><?=$r['id']?></td>
        <td style="padding:8px 4px;border-bottom:1px solid #f1f5f9"><?=$r['username']?></td>
        <td style="padding:8px 4px;border-bottom:1px solid #f1f5f9"><?=$r['name']?></td>
        <td style="padding:8px 4px;border-bottom:1px solid #f1f5f9"><?=$r['amount']?></td>
        <td style="padding:8px 4px;border-bottom:1px solid #f1f5f9"><?=$r['created_at']?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
