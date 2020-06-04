<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=api_PAL", "root", "");
} catch (PDOException $e) {
    die($e->getMessage());
}