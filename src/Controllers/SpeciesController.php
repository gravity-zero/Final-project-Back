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

    function delete(){
        $this->repository->deleteSpecies($_GET);
        return header('Location: ?url=show');
    }

    function show(){
        $requete = $this->repository->showSpecies($_GET);
        require_once __DIR__ . '/../Views/read.php'; 
    }

    function showUpdate(){
        $this->repository->selectUpdateSpecies($_GET);
        require_once __DIR__ . '/../Views/update.php';
    }

    function update(){
        $this->repository->selectUpdateSpecies($_POST);
        return header('Location: ?url=show');
    }

    function list(){
        $data = $this->repository->getAllSpecies();
        header('Content-Type: application/json');
        echo $this->serializeToJson($data);
    }

    function error(){
        require_once __DIR__ . '/../Views/404.php'; 
    }

    private function serializeToJson($data){
        $results["total_result"] = count($data);
        $response["results"]["species"] = $data;
        return json_encode($response);
    }
}