<?php
// Директорія для перегляду
$upload_dir = 'uploads/';

// Перевірка, чи існує директорія
if (is_dir($upload_dir)) {
    // Отримуємо список файлів у директорії
    $files = scandir($upload_dir);

    // Відфільтровуємо "." та "..", щоб не показувати їх у списку
    $files = array_diff($files, array('.', '..'));

    // Перевіряємо, чи є файли в директорії
    if (!empty($files)) {
        echo "<h3>Список файлів у директорії 'uploads':</h3>";
        echo "<ul>";
        
        // Виводимо кожен файл як посилання для завантаження
        foreach ($files as $file) {
            $file_path = $upload_dir . $file;
            echo "<li><a href='$file_path' download>" . htmlspecialchars($file) . "</a></li>";
        }

        echo "</ul>";
    } else {
        echo "У директорії 'uploads' немає файлів.";
    }
} else {
    echo "Директорія 'uploads' не існує.";
}
?>
