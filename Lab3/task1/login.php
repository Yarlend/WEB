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

// Оновлюємо час останньої активності
$_SESSION['last_activity'] = time();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {
        // Якщо ім'я передано, зберігаємо його в cookie
        $cookie_name = "user";
        $cookie_value = htmlspecialchars($_POST['username']);
        
        // Спроба встановити cookie
        if (setcookie($cookie_name, $cookie_value, time() + (7 * 24 * 60 * 60), "/")) {
            // Якщо cookie встановлено, перенаправляємо на сторінку привітання
            echo "Cookie встановлено: " . $cookie_value;
            header('Location: greeting.php');
            exit;
        } else {
            echo "Cookie не вдалося встановити.";
        }
    }

    // Видалення cookie, якщо була натиснута кнопка видалення
    if (isset($_POST['delete_cookie'])) {
        if (setcookie('user', '', time() - 3600, "/")) {
            // Якщо cookie видалено, перенаправляємо
            header('Location: greeting.php');
            exit;
        } else {
            echo "Не вдалося видалити cookie.";
        }
    }
} else {
    echo "POST-запит не був оброблений належним чином.";
}
?>
