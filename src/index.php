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

// Permet d'assigner la route aux bonnes fonctions/pages/actions attendu.
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
  else if($url == "update") // affiche l'entrée à modifier 
  {  
    $controller->showUpdate($_GET['id']);
  }
  else if($url == 'postupdate')  // Post l'update
  {
    $controller->update($_POST, $_GET['id']);
  }
  else if($url == 'delete')  //Supprime l'entrée dans la base
  {
    $controller->delete($_GET['id']);
  }
  else if($url == 'list') //Affiche la liste complète en base au format JSON
  {
    $controller->list();
  }
  else if($url == 'getone') // Affiche une entrée séléctionné par son ID au format JSON
  {
    $controller->getOne($_GET['id']);
  }
  else
  {
    $controller->error();
  }