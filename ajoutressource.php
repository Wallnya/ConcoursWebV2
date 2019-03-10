<?php
session_start();
$serveur = "localhost";
$login = "root";
$mdp = "";
//connexion au serveur mysql (ici localhost)
$connexion=mysqli_connect($serveur,$login,$mdp)
or die("Connexion au serveur $serveur impossible pour $login");
//nom de la base de donnees
$bd="webcontest";
//connexion à la base de donnees
mysqli_select_db($connexion,$bd)
or die("Impossible d'accéder à la base de données");

if(isset($_SESSION['id']) and isset($_SESSION['status']) ){
	$login=null;
  $jour = null;
  $nom=$_POST['inputGroupSelect02'];

  $reqinsert="INSERT into ressource(id,nom,jour,personne) VALUES(?,?,?,?)";
  $reqprepare=mysqli_prepare($connexion,$reqinsert);
  // insertion
	mysqli_stmt_bind_param($reqprepare,'ssss',$id,$nom,$jour,$login);
	mysqli_stmt_execute($reqprepare);
}

mysqli_close($connexion);
header('Location: admin.php');
?>
