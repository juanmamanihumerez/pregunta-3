<?php
define('USER', 'usuario324');
define('PASSWORD', '123456');
define('HOST', 'localhost');
define('DATABASE', 'juanmamanidb');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>