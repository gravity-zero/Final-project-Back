<?php
require_once __DIR__ . '/param.php';

try {
    $dsn = sprintf("mysql:host=%s;port=%d;dbname=%s", DB_HOST, DB_PORT, DB_NAME);

    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    sql_to_json(false, "Pas de résultat");
    die('Impossible de se connecter au serveur MySQL: ' . $e->getMessage());
}