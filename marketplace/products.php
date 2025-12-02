<?php
include "config.php";
if (!isset($_SESSION['user_id'])) header("Location: index.php");

$products = mysqli_query($conn, "SELECT * FROM products");
?>

<link rel="stylesheet" href="style.css">

<h2 style="text-align:center;">Каталог товаров</h2>
<p style="text-align:center;"><a href="logout.php">Выйти</a></p>

<div style="text-align:center;">

<?php while ($p = mysqli_fetch_assoc($products)) { ?>

<div class="product-card">
    <h3><?php echo $p['name']; ?></h3>
    <p>Цена: <?php echo $p['price']; ?>₸</p>
    <p>Остаток: <?php echo $p['quantity']; ?></p>

    <?php if ($p['quantity'] > 0) { ?>
        <form action="buy.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
            <input type="number" name="amount" value="1" min="1" max="<?php echo $p['quantity']; ?>">
            <button type="submit">Купить</button>
        </form>
    <?php } else { ?>
        <p class="out">Товар закончился</p>
    <?php } ?>
</div>

<?php } ?>

</div>
