<?php
    if (isset($_POST['mot_de_passe']) AND $_POST['pass'] == "1234") // Si le mot de passe est bon
    {
    // On affiche les codes
      header("location: welcome.php");
      exit;
    }
    else // Sinon, on affiche un message d'erreur
    {
      header("location: ../includes/404.php");
      exit;
    }
?>
