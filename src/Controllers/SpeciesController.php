<?php

namespace FinalBack\Controllers;

class SpeciesController{
    private $repository;
    public $nameTitle;

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

    function show(){
        $this->repository->showSpecies($_GET);
        require_once __DIR__ . '/../Views/read.php';
    }

    function update(){
        $this->repository->updateSpecies($_POST);
        require_once __DIR__ . '/../Views/update.php';
    }

    function delete(){
        $this->repository->deleteSpecies($_POST);
        require_once __DIR__ . '/../Views/delete.php';
    }

    function list(){
        $data = $this->repository->getAllSpecies();
        header('Content-Type: application/json');
        echo $this->serializeToJson($data);
    }

    function error(){
        return header('Location: ../src/views/404.php');
    }

    private function serializeToJson($data){
        $results["total_result"] = count($data);
        $response["results"]["species"] = $data;
        return json_encode($response);
    }
}