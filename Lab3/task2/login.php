<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // приклад перевірки логіну і паролю
    if ($username === 'admin' && $password === 'good_password1234') {
        $_SESSION['username'] = $username;
        header('Location: welcome.php');
        exit();
    } else {
        // Якщо дані невірні, повертаємо на сторінку входу з повідомленням про помилку
        header('Location: index.html?error=1');
        exit();
    }
}
?>
