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

$reqinsert="INSERT into personnel(id,mdp,status) VALUES(?,?,?)";

$reqprepare=mysqli_prepare($connexion,$reqinsert);

if(isset($_POST['id']) and isset($_POST['mdp']) ){
	$login=$_POST['id'];
	$mdp=$_POST['mdp'];
  $status="search";
	$reg = '/search[0-9]|/';

  if(preg_match($reg,$login)){
    // insertion
  	mysqli_stmt_bind_param($reqprepare,'sss',$login,$mdp,$status);
  	mysqli_stmt_execute($reqprepare);
  }
	else{
    echo "Vous ne pouvez pas supprimer ce chercheur";
  }
}

mysqli_close($connexion);
header('Location: admin.php');
?>
