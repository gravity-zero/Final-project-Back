<?php

//require "../vendor/autoload.php";

require_once ('../includes/connect.php');

header('Content-Type: application/json');

$requete = $pdo->prepare("SELECT * FROM `species`");
$requete->execute();
$result = $requete->fetchAll();

$response["success"] = true;
$response["results"]["total_result"] = count($result);
$response["results"]["species"] = $result;
echo json_encode($response);