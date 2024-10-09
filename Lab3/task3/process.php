<?php
// Перевірка методу запиту
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Перенаправлення на index.html, якщо метод не POST
    header('Location: index.html');
    exit();
}

// Виведення інформації про сервер та запит
echo "<h1>Інформація про сервер та запит</h1>";
echo "<ul>";
echo "<li>IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "</li>";
echo "<li>Назва та версія браузера: " . $_SERVER['HTTP_USER_AGENT'] . "</li>";
echo "<li>Назва скрипта: " . $_SERVER['PHP_SELF'] . "</li>";
echo "<li>Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "</li>";
echo "<li>Шлях до файлу на сервері: " . $_SERVER['SCRIPT_FILENAME'] . "</li>";
echo "</ul>";
?>
