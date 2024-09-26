<?php
// Перевіряємо, чи були дані надіслані методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Отримуємо дані з форми
    $first_name = htmlspecialchars(trim($_POST["first_name"]));
    $last_name = htmlspecialchars(trim($_POST["last_name"]));

    // Перевіряємо, чи не порожні поля
    if (!empty($first_name) && !empty($last_name)) {
        
        // Перевіряємо, що введені дані містять тільки літери
        if (preg_match("/^[a-zA-Zа-яА-ЯёЁїЇіІєЄ']+$/u", $first_name) && preg_match("/^[a-zA-Zа-яА-ЯёЁїЇіІєЄ']+$/u", $last_name)) {
            echo "<h1>Привіт, $first_name $last_name!</h1>";
        } else {
            echo "<h1>Помилка: Ім'я та прізвище мають містити тільки літери.</h1>";
        }

    } else {
        echo "<h1>Помилка: Всі поля мають бути заповнені.</h1>";
    }

} else {
    echo "<h1>Дані не були надіслані.</h1>";
}
?>
