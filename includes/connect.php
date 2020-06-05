<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=api_pal", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
}