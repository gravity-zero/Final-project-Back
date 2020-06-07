<?php 
/*
  $user = "root";  // <- ??? voir fichier includes/connect.php 
  $pass = "";
  
  if(isset($_POST['send'])){
    $specie = $_POST['specie'];
    $nom = $_POST['nom'];
    $deep_min = $_POST['deep_min'];
    $deep_max = $_POST['deep_max'];
    $life_time = $_POST['life_time'];
    $weight = $_POST['weight'];
    $size = $_POST['size'];
    $life_area = $_POST['life_area'];
    $description = $_POST['description'];
    $image = $_POST['image_link'];
    $image_alt = $_POST['image_alt'];
    $reproduction = $_POST['reproduction'];
    $food = $_POST['food'];
    $video = $_POST['video_link'];
    $video_alt = $_POST['video_alt'];
  }

    try{
      //instructions à faire dont certaines (ou toutes) menent à une exception
      $pdo = new PDO("mysql:host=localhost;dbname=api_PAL", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sth = $pdo->prepare(
      INSERT INTO `species`(`id`, `specie`, `name`, `deep_min`, `deep_max`, `life_time`, `weight`, `size`, `life_area`, `description`, `image_link`, `image_alt`, `reproduction`, `food`, `video_link`, `video_alt`)
       VALUES (:specie,:nom,:deep_min,:deep_max,:life_time,:weight,:size,:life_area,:description,:image_link,:image_alt,:reproduction,:food,:video_link,:video_alt);
      $sth->bindParam(":specie",$specie);
      $sth->bindParam(":nom",$nom);
      $sth->bindParam(":deep_min",$deep_min);
      $sth->bindParam(":deep_max",$deep_max);
      $sth->bindParam(":life_time",$life_time);
      $sth->bindParam(":weight",$weight);
      $sth->bindParam(":size",$size);
      $sth->bindParam(":life_area",$life_area);
      $sth->bindParam(":description",$description);
      $sth->bindParam(":image_link",$image);
      $sth->bindParam(":image_alt",$image_alt);
      $sth->bindParam(":reproduction",$reproduction);
      $sth->bindParam(":food",$food);
      $sth->bindParam("video_link",$video);
      $sth->bindParam(":video_alt",$video_alt);
  
      $sth->execute();

    }
    catch(PDOException $e){
      echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
  */
  ?>

