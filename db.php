<?php
$config = parse_ini_file(__DIR__ . "/config/parameters.ini", true);

if($config === false) {
    die("Не удалось подключиться к бд");
}

$db = $config['db'];

$dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['name']};charset={$db['charset']}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $db['login'], $db['password'], $options);
} catch (PDOException $e) {
    die("Ошибка подключения" . $e->getMessage());
}