<?php
require __DIR__ . "/db.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!$id || $id <= 0) {
    die("Получен неверный id");
}

$sql = "select id, title, path, description, user_id from materials where id = :id";
$result = $pdo->prepare($sql);
$result->bindParam( ':id', $id, PDO::PARAM_INT);
$result->execute();

$material = $result->fetch(PDO::FETCH_ASSOC);
var_dump($material);
