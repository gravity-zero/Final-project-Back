<?php

require "../vendor/autoload.php";

header('Content-Type: application/json');

$retour = array();
$retour["success"] = true;
$retour["message"] = "ok";
$retour["result"]["species"] = array("requin", "test");

echo json_encode($retour);