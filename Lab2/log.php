<?php
// Файл для запису
$log_file = 'log.txt';

// Дані для запису у файл
$data_to_write = "\nMonogatari best series\n";

// Запис даних у файл
file_put_contents($log_file, $data_to_write, FILE_APPEND | LOCK_EX); // FILE_APPEND додає до кінця файлу, LOCK_EX блокує файл на час запису

// Читання даних із файлу
$file_content = file_get_contents($log_file);

// Виведення вмісту файлу на сторінку
echo "<h3>Вміст файлу log.txt:</h3>";
echo nl2br(htmlspecialchars($file_content)); // nl2br для коректного відображення нових рядків
?>
