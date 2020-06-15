<?php

namespace FinalBack\Controllers;

/**
 * Fichier de controle des fonctions créé dans SpeciesRepository via index.php
 */

/**
 * SpeciesController
 */
class SpeciesController{
    private $repository;

    function __construct($repository){
        $this->repository = $repository;
    }

    //homepage
    function index(){
        require_once __DIR__ . '/../Views/welcome.php';
    }

    //Affiche le formulaire d'ajout     
    /**
     * form
     *
     * @return void
     */
    function form(){
        require_once __DIR__ . '/../Views/create.php';
    }


    function create(){
        $this->repository->createSpecies($_POST);
        return header('Location: ?url=');
    }

    
    /**
     * show
     *
     * @return void
     */
    function show(){
        $requete = $this->repository->showSpecies($_GET);
        require_once __DIR__ . '/../Views/read.php'; 
    }

    //Supprime l'entrée séléectionné par l'utilisateur en le ciblant via son ID
    function delete(int $id){
        $this->repository->deleteSpecies($id);
        return header('Location: ?url=show');
    }

    //Récupère les infos en base via l'id de l'espèce appelé à être modifié via read.php et affiche le formulaire rempli et prêt à être modifié.
    function showUpdate($id){
        $result = $this->repository->getSpeciesById($id);
        require_once __DIR__ . '/../Views/update.php';
    }

    //Envoie les données du formulaire d'ajout à la base et retourne sur la page read.php (?url=show)
    function update($param, $id){
        $this->repository->updateSpecies($param, $id);
        return header('Location: ?url=show');
    }

    /**
     * list() et getOne() sont deux fonction associé au EndPoint ?url=list et ?url=getone&id=[int]
     * Permettent l'affichage sous forme de liste ou espèce par espèce via l'ID
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
    
    function getOne($id){
        $this->enableCors();
        $data = $this->repository->getSpeciesById($id);
        if($data){
            echo $this->serializeToJson($data);
        }else{
            $this->error();
        }
    }
    //Renvoie vers la page 404.php
    function error(){
        require_once __DIR__ . '/../Views/404.php'; 
    }
   
    /**
     * serializeToJson
     *
     * @param  mixed $data
     * @return void
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