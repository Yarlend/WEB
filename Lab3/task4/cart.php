<?php
session_start();

// Додаємо товар до корзини
if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];
    
    // Перевіряємо, чи вже існує корзина в сесії
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Додаємо товар до корзини в сесії
    $_SESSION['cart'][] = $product;
}

// Збереження товарів в кукі після завершення сесії
if (isset($_POST['save_cart_to_cookie'])) {
    // Якщо є товари в сесії, зберігаємо їх в кукі
    if (isset($_SESSION['cart'])) {
        $previous_purchases = json_decode($_COOKIE['previous_purchases'] ?? '[]', true);
        $new_purchases = array_merge($previous_purchases, $_SESSION['cart']);
        
        // Зберігаємо нові покупки в кукі
        setcookie('previous_purchases', json_encode($new_purchases), time() + (86400 * 30), "/"); // 30 днів
    }
    
    // Очищуємо корзину в сесії
    unset($_SESSION['cart']);
}

// Повертаємося на index.php після обробки
header('Location: index.php');
exit;
?>
