<?php

namespace FinalBack\Controllers;

/**
 * SpeciesController Controle des fonctions créé dans SpeciesRepository via index.php
 * 
 * Permet le controle des fonctions à éxécuter et des pages à afficher/retourner après éxécution
 * 
 * @author FEREGOTTO Romain (romain.feregotto@hetic.net)
 */

class SpeciesController{
    private $repository;

    function __construct($repository){
        $this->repository = $repository;
    }
		
    function index(){
        require_once __DIR__ . '/../Views/welcome.php';
    }
    
    /**
     * form Affiche le formulaire de création d'espèce
     *
     * @return void
     */
    function form(){
        require_once __DIR__ . '/../Views/create.php';
    }
    
    /**
     * create Envoie le formulaire de création pour populer la base de donnée
     *
     * @return void
     */
    function create(){
        $this->repository->createSpecies($_POST);
        return $this->index();
    }
    
    /**
     * show Affiche dans un tableau les entrées en base en les classant par ID
     *
     * @return void
     */
    function show(){
        $requete = $this->repository->showSpecies($_GET);
        require_once __DIR__ . '/../Views/read.php'; 
    }
    
    /**
     * delete Efface une entrée en base via son ID
     *
     * @param  int $id Récupère l'ID
		 * 
     * @return void
     */
    function delete(int $id){
        $this->repository->deleteSpecies($id);
        return header('Location: ?url=show');
    }
    
    /**
     * showUpdate Affiche les informations récupéré en base pour populer le formulaire d'édition
     *
     * @param  int $id Récupère l'ID
     * @return void
     */
    function showUpdate(int $id){
        $result = $this->repository->getSpeciesById($id);
        require_once __DIR__ . '/../Views/update.php';
    }
    
    /**
     * update Envoie les modifications à la base en précisant bien l'ID concerné
     *
     * @param  mixed $param Paramètre du formulaire d'édition
     * @param  int $id Récupère l'ID
     * @return void
     */
    function update($param,int $id){
        $this->repository->updateSpecies($param, $id);
        return header('Location: ?url=show');
    }
    
    /**
     * list EndPoint numéro 1 pour l'api
     *
     * @return void
     */
    function list(){
        $this->enableCors();
        $data = $this->repository->getAllSpecies();
        if($data){
          echo $this->serializeToJson($data);
        }else{
        	$this->error();
    		}
    }
        
    /**
     * getOne EndPoint numéro 2 pour l'api 
     *
     * @param  int $id Récupère l'ID
     * @throws error Lance la fonction error
     * @return array json
     */
    function getOne(int $id){
        $this->enableCors();
        $data = $this->repository->getSpeciesById($id);
        if($data){
          echo $this->serializeToJson($data);
        }else{
          $this->error();
        }
    }

    function error(){
        require_once __DIR__ . '/../Views/404.php'; 
    }
       
    /**
     * serializeToJson Converti la réponse en JSON
     *
     * @param  mixed $data
     * @return array json
     */
    private function serializeToJson($data){
      $results["total_result"] = count($data);
      $response["results"]["species"] = $data;
      return json_encode($response);
    }

    //CORS ORIGIN - Ne fonctionne pas du fait qu'OPTIONS ne peux pas utiliser le header: Authorization
    //Mise en place d'un proxy en front qui simule un localhost
    /***
     * TODO: Mettre en place un système d'authentification moins problématique
     */
    private function enableCors(){
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: Authorization');
            header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: Authorization');
            header('Access-Control-Max-Age: 1728000');
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
    }
}