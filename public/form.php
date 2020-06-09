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
  <form method="post" action="traitement.php" class="containerstyle">
  <div class="form-group">
    <label for="name">Nom de l'animal</label>
    <input class="form-control-sm" type="text" name="name">
  </div>
  <div class="form-group">
  <label for="family">Espèce</label>
    <select class="form-control-sm" id="family" name="family">
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
    </div>
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
  <label for="weight">Poids moyen en <strong>Kg</strong></label>
    <input class="form-control-sm" type="text" name="weight">
  </div>
  <div class="form-group">
  <label for="size">taille moyenne en <strong>cm</strong></label>
    <input class="form-control-sm" type="text" name="size">
  </div>
  <div class="form-group">
  <label for="life_area">Zone Géographique</label>
    <input class="form-control-sm" type="text" name="life_area">
  </div>
  <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" rows="3" cols="45" name="description"></textarea>
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
            <input class="form-control-sm" type="submit" name="send" value="Ajouter" />
</form>
</div>



</body>
</html>