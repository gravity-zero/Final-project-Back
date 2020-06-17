<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="boostrap/css/bootstrap.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <script src="boostrap/js/bootstrap.js"></script>
  <title>Pannel admin - Ajout</title>
</head>

<body>
  <nav aria-label="navigation">
    <a href='?url=' class="previous"><img src=" css/images/back.png" class="back" alt=" Retour à l'index"></a>
  </nav>
  <div class="form">
    <h1>Pannel Administration - Ajout</h1>
    <form method="post" action="?url=create" class="containerstyle">
      <div class="form-group">
        <label for="name">Nom de l'animal</label>
        <input class="form-control-sm" type="text" name="name" />
      </div>
      <div class="form-group">
        <label for="family">Espèce</label>
        <select class="form-control-sm" id="family" name="family">
          <!--voir fichier constants.php-->
          <?php foreach(SPECIES as $specie) {
              echo "<option>$specie</option>";  
          }?>
        </select>
      </div>
      <div class="form-group">
        <label for="profondeur">Profondeur minimale </label>
        <select class="form-control" id="deep_min" name="deep_min">
          <?php foreach(DEEP_MIN as $val) {
              echo "<option>$val</option>";  
          }?>
        </select>
        <label for="profondeur">Profondeur maximale</label>
        <select class="form-control" id="deep_max" name="deep_max">
          <?php foreach(DEEP_MAX as $val) {
              echo "<option>$val</option>";  
          }?>
        </select>
      </div>

      <div class="form-group">
        <label for="life_time">Durée de vie</label>
        <input class="form-control-sm" type="text" name="life_time" />
      </div>
      <div class="form-group">
        <label for="weight">Poids moyen en <strong>Kg</strong></label>
        <input class="form-control-sm" type="text" name="weight" />
      </div>
      <div class="form-group">
        <label for="size">taille moyenne en <strong>cm</strong></label>
        <input class="form-control-sm" type="text" name="size" />
      </div>
      <div class="form-group">
        <label for="life_area">Zone Géographique</label>
        <input class="form-control-sm" type="text" name="life_area" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="3" cols="45" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="image_link">Lien image</label>
        <input class="form-control-sm" type="text" name="image_link" />
      </div>
      <div class="form-group">
        <label for="image_link">Alt image</label>
        <input class="form-control-sm" type="text" name="image_alt" />
      </div>
      <div class="form-group">
        <label for="reproduction">Mode de reproduction</label>
        <input class="form-control-sm" type="text" name="reproduction" />
      </div>
      <div class="form-group">
        <label for="food">Alimentation</label>
        <input class="form-control-sm" type="text" name="food" />
      </div>
      <div class="form-group">
        <label for="video_link">Lien de la vidéo (Optionnel)</label>
        <input class="form-control-sm" type="text" name="video_link" />
      </div>
      <div class="form-group">
        <label for="food">Alt de la vidéo (optionnel)</label>
        <input class="form-control-sm" type="text" name="video_alt" />
      </div>
      <div class="form-group" id="addButton">
        <input class=" btn btn-outline-primary" type="submit" value="Ajouter" />
      </div>
    </form>
  </div>
</body>

</html>