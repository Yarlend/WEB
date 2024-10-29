<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина покупок</title>
</head>
<body>

<h1>Корзина покупок</h1>

<!-- Додавання товару до корзини -->
<form action="cart.php" method="post">
    <label for="product">Додати товар до корзини:</label>
    <input type="text" name="product" id="product" required>
    <button type="submit" name="add_to_cart">Додати</button>
</form>

<!-- Виведення товарів у корзині -->
<h2>Товари у вашій корзині:</h2>
<ul>
    <?php session_start(); ?>
    <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Ваша корзина порожня</li>
    <?php endif; ?>
</ul>

<!-- Збереження корзини в кукі -->
<form action="cart.php" method="post">
    <button type="submit" name="save_cart_to_cookie">Зберегти корзину і завершити сеанс</button>
</form>

<!-- Виведення попередніх покупок -->
<h2>Ваші попередні покупки:</h2>
<ul>
    <?php
    $previous_purchases = json_decode($_COOKIE['previous_purchases'] ?? '[]', true);
    if (!empty($previous_purchases)): ?>
        <?php foreach ($previous_purchases as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Немає попередніх покупок</li>
    <?php endif; ?>
</ul>

</body>
</html>
