<?php

//require "../vendor/autoload.php";
include '../includes/api.php';
require_once ('../includes/connect.php');

header('Content-Type: application/json');

$requete = $pdo->prepare("SELECT * FROM `species`");
$requete->execute();
$results = $requete->fetchAll();

sql_to_json(true, $results);