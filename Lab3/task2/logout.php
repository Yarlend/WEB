<?php
session_start();
session_unset();
session_destroy();

// Перенаправлення на головну сторінку після виходу
header('Location: index.html');
exit();
