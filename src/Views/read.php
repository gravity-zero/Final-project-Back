<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="boostrap/css/bootstrap.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <script src="boostrap/js/bootstrap.js"></script>
  <title>Pannel Administrateur - PAL | Lecture</title>
</head>

<body class="container" id="body-read">
  <div class="titre">
    <h1>Affichage des entrées</h1>
  </div>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">family</th>
        <th scope="col">deep_min</th>
        <th scope="col">deep_max</th>
        <th scope="col">life_time</th>
        <th scope="col">weight</th>
        <th scope="col">size</th>
        <th scope="col">life_area</th>
        <th scope="col">description</th>
        <th scope="col">image_link</th>
        <th scope="col">image_alt</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $number = 0;
        foreach ($requete as $params){
        $number++;
      ?>
      <tr>
        <td><?= $number ?></td>
        <td><?= $params['id'] ?></td>
        <td><?= $params['family'] ?></td>
        <td><?= $params['deep_min'] ?></td>
        <td><?= $params['deep_max'] ?></td>
        <td><?= $params['life_time'] ?></td>
        <td><?= $params['weight'] ?></td>
        <td><?= $params['size'] ?></td>
        <td><?= $params['life_area'] ?></td>
        <td class="text-ellipsis"><?= $params['description'] ?></td>
        <td><?= $params['image_link'] ?></td>
        <td><?= $params['image_alt'] ?></td>
        <!--<td><?= $params['reproduction'] ?></td>
          <td><?= $params['food'] ?></td>
          <td><?= $params['video_link'] ?></td>
          <td><?= $params['video_alt'] ?></td>-->
        <td><a href="?url=update/<?= $params['id'] ?>">
            <button type="button" class="btn btn-success"> Modifier</button>
          </a></td>
        <td><a href="?url=delete/<?= $params['id'] ?>"><button type="button"
              class="btn btn-danger">Supprimer</button></a>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
  <div class="option"> <a href="?url=form"><button type="button" class="btn btn-light">Ajouter une
        espèce</button></a>
  </div>
</body>

</html>