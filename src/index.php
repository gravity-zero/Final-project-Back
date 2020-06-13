<?php
require_once 'Models/param.php';
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

  if ($url == '') { //Affiche le pannel admin
    $controller->index();
  }
  else if($url == 'form') //Affiche le formulaire
  {
    $controller->form();
  }
  else if($url == 'create') // Post le formulaire
  {
    $controller->create();
  }
  else if($url == 'show') //Affiche sous forme de Tableau la base
  {
    $controller->show();
  }
  else if(preg_match('#update/([0-9]+)#', $url, $params)){// affiche l'entrée à modifier
    $id = $params[1]; 
    $controller->showUpdate();
  }
  else if($url == 'postupdate'){// Post l'update
    $controller->update();
  }
  else if(preg_match('#delete/([0-9]+)#', $url, $params)){//Supprime l'entrée dans la base
    $id = $params[1];
    $controller->delete();
  }
  else if($url == 'list')  //Affiche le Json
  {
    $controller->list();
  }
  else
  {
    $url == "error";
    $controller->error();
  }