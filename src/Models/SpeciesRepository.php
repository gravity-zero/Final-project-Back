<?php
namespace FinalBack\Models;
use \PDO;

/**
 * SpeciesRepository
 */
class SpeciesRepository{

    private $db;

    function __construct($db){
      $this->db = $db;
    }

    
   //Pour delete certaines entrées (utilisé dans read.php)
    public function deleteSpecies($id){
      $requete = $this->db->connection->prepare('DELETE FROM `species` WHERE `species`.`id` = :id');
      $requete->bindValue(':id', $id, PDO::PARAM_INT);
      $requete->execute();
    }

    //Fonction permettant la récupération de l'id de l'entrée affiché dans read.php
    public function getSpeciesById($id){
      $requete = $this->db->connection->prepare("SELECT * FROM `species` WHERE id= :id");
      $requete->bindValue(':id', $id, PDO::PARAM_INT);
      $requete->execute(); 
      return $requete->fetch(PDO::FETCH_ASSOC);
  }

    public function updateSpecies($param, $id){
      if(isset($param)){
        $family = $param['family'];
        $name = $param['name'];
        $deep_min = $param['deep_min'];
        $deep_max = $param['deep_max'];
        $life_time = $param['life_time'];
        $weight = $param['weight'];
        $size = $param['size'];
        $life_area = $param['life_area'];
        $description = $param['description'];
        $image_link = $param['image_link'];
        $image_alt = $param['image_alt'];
        $reproduction = $param['reproduction'];
        $food = $param['food'];
        $video_link = $param['video_link'];
        $video_alt = $param['video_alt'];
      }
     try{
        $sth = $this->db->connection->prepare(
        'UPDATE `species` 
        SET family = :family, name = :name, deep_min = :deep_min, deep_max = :deep_max, life_time = :life_time, weight = :weight, size = :size, life_area = :life_area, description = :description, image_link = :image_link, image_alt = :image_alt ,video_link = :video_link, video_alt =:video_alt, reproduction =:reproduction, food =:food
        WHERE id = :id');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->bindParam(":family",$family, PDO::PARAM_STR);
            $sth->bindParam(":name",$name, PDO::PARAM_STR);
            $sth->bindParam(":deep_min",$deep_min, PDO::PARAM_INT);
            $sth->bindParam(":deep_max",$deep_max, PDO::PARAM_INT);
            $sth->bindParam(":life_time",$life_time, PDO::PARAM_INT);
            $sth->bindParam(":weight",$weight, PDO::PARAM_INT);
            $sth->bindParam(":size",$size, PDO::PARAM_INT);
            $sth->bindParam(":life_area",$life_area, PDO::PARAM_STR);
            $sth->bindParam(":description", $description, PDO::PARAM_STR);
            $sth->bindParam(":image_link",$image_link, PDO::PARAM_STR);
            $sth->bindParam(":image_alt",$image_alt, PDO::PARAM_STR);
            $sth->bindParam(":reproduction",$reproduction, PDO::PARAM_STR);
            $sth->bindParam(":food",$food, PDO::PARAM_STR);
            $sth->bindParam(":video_link",$video_link, PDO::PARAM_STR);
            $sth->bindParam(":video_alt",$video_alt, PDO::PARAM_STR);
            
            $sth->execute();
          } catch(\PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '. $e->getMessage();
          }
  }

    // Pour afficher toutes les entrées
    public function showSpecies(){
      $requete = $this->db->connection->prepare("SELECT * FROM `species` ORDER BY `species`.`id` ASC");
      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pour afficher toutes les entrés au format JSON
    public function getAllSpecies(){
        $requete = $this->db->connection->prepare("SELECT * FROM `species`");
        $requete->execute();
        return $requete->fetchAll();
    }

    public function createSpecies($params){
      if(isset($params)){
          $family = $params['family'];
          $name = $params['name'];
          $deep_min = $params['deep_min'];
          $deep_max = $params['deep_max'];
          $life_time = $params['life_time'];
          $weight = $params['weight'];
          $size = $params['size'];
          $life_area = $params['life_area'];
          $description = $params['description'];
          $image_link = $params['image_link'];
          $image_alt = $params['image_alt'];
          $reproduction = $params['reproduction'];
          $food = $params['food'];
          $video_link = $params['video_link'];
          $video_alt = $params['video_alt'];
        }
      
        try{
            $sth = $this->db->connection->prepare(
            'INSERT INTO species(family, name, deep_min, deep_max, life_time, weight, size, life_area, description, image_link, image_alt, reproduction, food, video_link, video_alt)
             VALUES (:family,:name,:deep_min,:deep_max,:life_time,:weight,:size,:life_area,:description,:image_link,:image_alt,:reproduction,:food,:video_link,:video_alt)');
            
            $sth->bindParam(":family",$family, PDO::PARAM_STR);
            $sth->bindParam(":name",$name, PDO::PARAM_STR);
            $sth->bindParam(":deep_min",$deep_min, PDO::PARAM_INT);
            $sth->bindParam(":deep_max",$deep_max, PDO::PARAM_INT);
            $sth->bindParam(":life_time",$life_time, PDO::PARAM_INT);
            $sth->bindParam(":weight",$weight, PDO::PARAM_INT);
            $sth->bindParam(":size",$size, PDO::PARAM_INT);
            $sth->bindParam(":life_area",$life_area, PDO::PARAM_STR);
            $sth->bindParam(":description",$description, PDO::PARAM_STR);
            $sth->bindParam(":image_link",$image_link, PDO::PARAM_STR);
            $sth->bindParam(":image_alt",$image_alt, PDO::PARAM_STR);
            $sth->bindParam(":reproduction",$reproduction, PDO::PARAM_STR);
            $sth->bindParam(":food",$food, PDO::PARAM_STR);
            $sth->bindParam(":video_link",$video_link, PDO::PARAM_STR);
            $sth->bindParam(":video_alt",$video_alt, PDO::PARAM_STR);
      
            $sth->execute();
          } catch(\PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '. $e->getMessage();
          }
    }
}