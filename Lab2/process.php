<?php
// Проверка, если файл был загружен без ошибок
if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === 0) {
    
    // Проверка, что файл действительно загружен
    if (is_uploaded_file($_FILES['uploaded_file']['tmp_name'])) {
        // Проверка типа файла
        $file_type = mime_content_type($_FILES['uploaded_file']['tmp_name']);
        $allowed_types = ['image/png', 'image/jpeg'];

        if (in_array($file_type, $allowed_types)) {
            // Проверка размера файла (максимум 2 МБ)
            if ($_FILES['uploaded_file']['size'] <= 2 * 1024 * 1024) {
                // Директория для загрузки файлов
                $upload_dir = 'uploads/';
                
                // Создание директории, если её нет
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Изначальное имя файла
                $original_file_name = basename($_FILES['uploaded_file']['name']);
                $file_name = pathinfo($original_file_name, PATHINFO_FILENAME);
                $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
                
                // Генерация уникального имени файла, если файл с таким именем уже существует
                $counter = 1;
                $new_file_name = $original_file_name;
                
                while (file_exists($upload_dir . $new_file_name)) {
                    $new_file_name = $file_name . '_' . $counter . '.' . $file_extension;
                    $counter++;
                }

                $upload_file = $upload_dir . $new_file_name;

                // Перемещение загруженного файла
                if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $upload_file)) {
                    echo "Файл успішно завантажений</br>";

                    // Вывод информации о файле
                    echo "Ім'я файлу: " . htmlspecialchars($file_name) . "<br>";
                    echo "Тип файлу: " . htmlspecialchars($file_type) . "<br>";
                    echo "Розмір файлу: " . round($_FILES['uploaded_file']['size'] / 1024, 2) . " КБ<br>";

                    // Ссылка для скачивания файла
                    echo "<a href='$upload_file' download>Завантажити файл</a><br>";
                } else {
                    echo "Помилка при завантаженні файлу.<br>";
                }
            } else {
                echo "Файл перевищує максимальний розмір (2 МБ).<br>";
            }
        } else {
            echo "Дозволено завантажувати лише зображення (PNG, JPG).<br>";
        }
    } else {
        echo "Файл не був завантажений.<br>";
    }
} else {
    echo "Файл не був завантажений або виникла помилка.<br>";
}
?>
