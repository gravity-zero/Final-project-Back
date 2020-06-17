<?php
require_once 'constants.php';
require_once __DIR__ . '/../vendor/autoload.php';

  
use FinalBack\Models\Database;
use FinalBack\Models\SpeciesRepository;
use FinalBack\Controllers\SpeciesController;

$dsn = sprintf("mysql:host=%s;port=%d;dbname=%s;charset=utf8", DB_HOST, DB_PORT, DB_NAME);
$db = new Database($dsn, DB_USERNAME, DB_PASSWORD);
$species_repository = new SpeciesRepository($db);
$controller = new SpeciesController($species_repository);

$url = null;

if(isset($_GET['url'])){
  $url = $_GET['url'];
  }

  if ($url == '') {
    $controller->index();
  }
  else if($url == 'form')
  {
    $controller->form();
  }
  else if($url == 'create')
  {
    $controller->create();
  }
  else if($url == 'show')
  {
    $controller->show();
  }
  else if($url == "update")
  {  
    $controller->showUpdate($_GET['id']);
  }
  else if($url == 'postupdate')
  {
    $controller->update($_POST, $_GET['id']);
  }
  else if($url == 'delete')
  {
    $controller->delete($_GET['id']);
  }
  else if($url == 'list')
  {
    $controller->list();
  }
  else if($url == 'getone')
  {
    $controller->getOne($_GET['id']);
  }
  else
  {
    $controller->error();
  }