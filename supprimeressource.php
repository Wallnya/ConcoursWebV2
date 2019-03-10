<?php
  session_start();
  $connexion = mysqli_connect("localhost","root","")
  or die ("Tu es nul. Recommence.");
  // $connexion = mysqli_connect("localhost","g1","")
  // or die ("Tu es nul. Recommence.");

  $bd="webcontest";

  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");

  $sql ='DELETE from ressource WHERE id='.$_GET["id"];

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
  mysqli_query($connexion,$sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

  mysqli_close($connexion);
  header('Location: admin.php');

?>
