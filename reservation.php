<?php
  session_start();

echo "<h1>Reservation</h1>";
  $connexion = mysqli_connect("localhost","g1","mdp01")
  or die ("Tu es nul. Recommence.");
  //$connexion = mysqli_connect("localhost","root","")
  //or die ("Tu es nul. Recommence.");
  $bd="WebContest";
  mysqli_select_db($connexion,$bd)
  or die ("Toujours pas.");
  $ressource = "2";
   
  $requete = $connexion -> prepare("UPDATE Ressource SET jour = DATE(NOW()) WHERE idn = ?");
  $requete->bind_param("s",$ressource);
  $requete -> execute();
  $requete->close();
	mysqli_close($connexion);
	header('Location: index.php');

?>