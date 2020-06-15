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
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Famille</th>
        <th scope="col">P_min</th>
        <th scope="col">P_max</th>
        <th scope="col">D_vie</th>
        <th scope="col">Poids</th>
        <th scope="col">Taille</th>
        <th scope="col">Zone géo</th>
        <th scope="col">desc</th>
        <th scope="col">Lien image</th>
        <th scope="col">Alt image</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //Number permet d'afficher le nombre d'élément présent dans la liste indépendamment de l'id qui n'est pas fiable pour cette information
        $number = 0;
        foreach ($requete as $params){
        $number++;
      ?>
      <tr>
        <td><?= $number ?></td>
        <td><?= $params['id'] ?></td>
        <td><?= $params['name'] ?></td>
        <td><?= $params['family'] ?></td>
        <td><?= $params['deep_min'] ?></td>
        <td><?= $params['deep_max'] ?></td>
        <td><?= $params['life_time'] ?></td>
        <td><?= $params['weight'] ?></td>
        <td><?= $params['size'] ?></td>
        <td><?= $params['life_area'] ?></td>
        <td class="text-ellipsis">
          <div class="table-height"><?= $params['description'] ?></div>
        </td>
        <td class="text-ellipsis">
          <div class="table-height"><?= $params['image_link'] ?></div>
        </td>
        <td class="text-ellipsis"><?= $params['image_alt'] ?></td>
        <td><a href="?url=update&id=<?= $params['id'] ?>">
            <button type="button" class="btn btn-success"> Modifier</button>
          </a></td>
        <td><a href="?url=delete&id=<?= $params['id'] ?>"><button type="button"
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