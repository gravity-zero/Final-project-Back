<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="boostrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="boostrap/js/bootstrap.js"></script>
  <title>Pannel admin</title>
</head>
<body>
<div class = "form">
  <h1>Pannel Administration</h1>
  <form method="post" action="formulaire.php" class="containerstyle">
  <div class="form-group">
    <label for="nom">Nom de l'animal</label>
    <input class="form-control-sm" type="text" name="nom">
  </div>
  <label for="specie">Espèce</label>
    <select class="form-control" id="specie" name="specie">
      <option>Poissons</option>
      <option>Mollusques</option>
      <option>Cnidaires</option>
      <option>Arthropodes</option>
      <option>Echinodermes</option>
      <option>Spongiaires</option>
      <option>Végétaux</option>
      <option>Tuniciers</option>
      <option>Vers</option>
      <option>Mammifères</option>
      <option>Bryozaires</option>
      <option>Reptiles</option>
      <option>Cténaires</option>
      <option>Lichens</option>
    </select>
    <div class="form-group">
    <label for="profondeur">Profondeur minimale </label>
    <select class="form-control" id="deep_min" name="deep_min">
      <option>0m</option>
      <option>150m</option>
      <option>300m</option>
      <option>500m</option>
      <option>1000m</option>
      <option>2000m</option>
      <option>3000m</option>
      <option>4000m</option>
      <option>5000m</option>
      <option>6000m</option>
      <option>7000m</option>
      <option>8000m</option>
      <option>9000m</option>
      <option>10000m</option>
    </select>
    <label for="profondeur">Profondeur maximal</label>
    <select class="form-control" id="deep_max" name="deep_max">
      <option>150m</option>
      <option>300m</option>
      <option>500m</option>
      <option>1000m</option>
      <option>2000m</option>
      <option>3000m</option>
      <option>4000m</option>
      <option>5000m</option>
      <option>6000m</option>
      <option>7000m</option>
      <option>8000m</option>
      <option>9000m</option>
      <option>10000m</option>
      <option>11000m</option>
    </select>
  </div>

  <div class="form-group">
    <label for="life_time">Durée de vie</label>
    <input class="form-control-sm" type="text" name="life_time">
  </div>
  <div class="form-group">
  <label for="weight">Poids moyen</label>
    <input class="form-control-sm" type="text" name="weight">
    <p>kg</p>
  </div>
  <div class="form-group">
  <label for="size">taille moyenne</label>
    <input class="form-control-sm" type="text" name="size">
    <p>cm</p>
  </div>
  <div class="form-group">
  <label for="life_area">Zone Géographique</label>
    <input class="form-control-sm" type="text" name="life_area">
  </div>
  <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="image_link">Lien image</label>
      <input class="form-control-sm" type="text" name="image_link">
      <label for="image_link">Alt image</label>
      <input class="form-control-sm" type="text" name="image_alt">
    </div>
    <div class="form-group">
      <label for="reproduction">Mode de reproduction</label>
        <input class="form-control-sm" type="text" name="reproduction">
      </div>
      <div class="form-group">
        <label for="food">Alimentation</label>
          <input class="form-control-sm" type="text" name="food">
        </div>
        <div class="form-group">
          <label for="video_link">Lien de la vidéo (Optionnel)</label>
            <input class="form-control-sm" type="text" name="video_link">
            <label for="food">Alt de la vidéo (optionnel)</label>
              <input class="form-control-sm" type="text" name="video_alt">
            </div>
            <div class="form-group">
        <label for="espèce">Espèce</label>
          <input class="form-control-sm" type="text" name="espèce">
        </div>
            <input type="submit" value="Valider" />
</form>
</div>

<?php 
  $user = "root";  // <- ??? voir fichier includes/connect.php 
  $pass = "";
  
  if(isset($_POST)){
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
  
  ?>


</body>
</html>