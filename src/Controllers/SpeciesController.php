<?php

namespace FinalBack\Controllers;

class SpeciesController{
    private $repository;

    function __construct($repository){
        $this->repository = $repository;
    }

    function index(){
        require_once __DIR__ . '/../Views/welcome.php';
    }

    function form(){
        require_once __DIR__ . '/../Views/create.php';
    }

    function create(){
        $this->repository->createSpecies($_POST);
        return header('Location: ?url=');
    }

    function delete(int $id){
        $this->repository->deleteSpecies($id);
        return header('Location: ?url=show');
    }

    function show(){
        $requete = $this->repository->showSpecies($_GET);
        require_once __DIR__ . '/../Views/read.php'; 
    }

    function showUpdate($id){
        $result = $this->repository->getSpeciesById($id);
        require_once __DIR__ . '/../Views/update.php';
    }

    function update($param, $id){
        $this->repository->updateSpecies($param, $id);
        return header('Location: ?url=show');
    }

    
    function list(){
        $this->enableCors();
        $data = $this->repository->getAllSpecies();
        echo $this->serializeToJson($data);
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

    function error(){
        require_once __DIR__ . '/../Views/404.php'; 
    }

    private function serializeToJson($data){
        $results["total_result"] = count($data);
        $response["results"]["species"] = $data;
        return json_encode($response);
    }

    //CORS ORIGIN
    private function enableCors(){
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
            header('Access-Control-Allow-Headers: *');
            header('Access-Control-Max-Age: 1728000');
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
    }
}