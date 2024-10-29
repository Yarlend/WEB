<?php
session_start(); // Старт сесії

// Встановлюємо максимальний час неактивності (5 хвилин = 300 секунд)
$timeout_duration = 300;

// Перевіряємо, чи була активність сесії
if (isset($_SESSION['last_activity'])) {
    // Якщо минуло більше часу, ніж дозволено, знищуємо сесію
    if (time() - $_SESSION['last_activity'] > $timeout_duration) {
        session_unset();   // Очистити змінні сесії
        session_destroy(); // Завершити сесію
        header("Location: index.html"); // Перенаправляємо користувача на сторінку входу
        exit();
    }
}

// Перевіряємо наявність cookie
if (isset($_COOKIE['user'])) {
    $username = htmlspecialchars($_COOKIE['user']);
    echo "Cookie успішно прочитано: " . $username; // Додатковий вивід для перевірки
} else {
    $username = null;
    echo "Cookie не встановлене або не прочитане.";
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Привітання</title>
</head>
<body>
    <?php if ($username): ?>
        <h1>Привіт, <?php echo $username; ?>!</h1>
        <form action="login.php" method="post">
            <button type="submit" name="delete_cookie">Видалити cookie</button>
        </form>
    <?php else: ?>
        <h1>Ім'я не збережене. Поверніться на <a href="index.html">форму</a>.</h1>
    <?php endif; ?>
</body>
</html>
