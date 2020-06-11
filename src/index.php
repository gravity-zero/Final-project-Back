<?php
require_once 'param.php';
require_once __DIR__ . '/../vendor/autoload.php';

use FinalBack\Models\Database;
use FinalBack\Models\SpeciesRepository;
use FinalBack\Controllers\SpeciesController;

$dsn = sprintf("mysql:host=%s;port=%d;dbname=%s", DB_HOST, DB_PORT, DB_NAME);
$db = new Database($dsn, DB_USERNAME, DB_PASSWORD);
$species_repository = new SpeciesRepository($db);
$controller = new SpeciesController($species_repository);

$req = null;

if(isset($_GET['r'])){
    $req = $_GET['r'];
}


switch($req){
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'list':
        $controller->list();
        break;
    default:
        $controller->index();
}
