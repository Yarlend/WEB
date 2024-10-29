<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Якщо користувач не увійшов, перенаправляємо на сторінку входу
    header('Location: index.html');
    exit();
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
    <h2>Привіт, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Ви успішно увійшли в систему.</p>
    <form method="POST" action="logout.php">
        <button type="submit">Вихід</button>
    </form>
</body>
</html>
