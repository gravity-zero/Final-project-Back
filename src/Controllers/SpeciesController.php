<?php

namespace FinalBack\Controllers;

class SpeciesController{
    private $repository;

    function __construct($repository){
        $this->repository = $repository;
    }

    function index(){
        return header('Location: ../src/views/form.php');
    }

    function create(){
        $this->repository->createSpecies($_POST);
        return header('Location: ../src/views/form.php');
    }

    function list(){
        $data = $this->repository->getAllSpecies();
        header('Content-Type: application/json');
        echo $this->serializeToJson($data);
    }

    private function serializeToJson($data){
        $results["total_result"] = count($data);
        $response["results"]["species"] = $data;
        return json_encode($response);
    }
}