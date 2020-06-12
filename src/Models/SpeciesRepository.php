<?php
namespace FinalBack\Models;

class SpeciesRepository{

    private $db;

    function __construct($db){
      $this->db = $db;
    }

    public function updateSpecies($id, $params){
      //Pour modifier les entrées
    }

    // Pour afficher toutes les entrées
    public function showSpecies(){
      $requete = $this->db->connection->prepare("SELECT * FROM `species` ORDER BY `species`.`id` ASC");
      $requete->execute();
      return $requete->fetchAll(\PDO::FETCH_ASSOC);
    }

        //Pour delete certaines entrées
        public function deleteSpecies($id){
          $requete = $this->db->connection->prepare("DELETE FROM `species` WHERE `species`.`id` =:id");
          $requete->bindValue(':id', $id, \PDO::PARAM_INT);
          $requete->execute();
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
            //instructions à faire dont certaines menent à une exception
            $sth = $this->db->connection->prepare(
            'INSERT INTO species(family, name, deep_min, deep_max, life_time, weight, size, life_area, description, image_link, image_alt, reproduction, food, video_link, video_alt)
             VALUES (:family,:name,:deep_min,:deep_max,:life_time,:weight,:size,:life_area,:description,:image_link,:image_alt,:reproduction,:food,:video_link,:video_alt)');
            
            $sth->bindParam(":family",$family);
            $sth->bindParam(":name",$name);
            $sth->bindParam(":deep_min",$deep_min);
            $sth->bindParam(":deep_max",$deep_max);
            $sth->bindParam(":life_time",$life_time);
            $sth->bindParam(":weight",$weight);
            $sth->bindParam(":size",$size);
            $sth->bindParam(":life_area",$life_area);
            $sth->bindParam(":description",$description);
            $sth->bindParam(":image_link",$image_link);
            $sth->bindParam(":image_alt",$image_alt);
            $sth->bindParam(":reproduction",$reproduction);
            $sth->bindParam(":food",$food);
            $sth->bindParam(":video_link",$video_link);
            $sth->bindParam(":video_alt",$video_alt);
      
            $sth->execute();
          } catch(\PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '. $e->getMessage();
          }
    }
}