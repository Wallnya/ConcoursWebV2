<?php

session_start();

error_reporting(E_ALL);

if(isset($_POST['id']) and isset($_POST['mdp'])){
$serveur = "localhost";
$login = "root";
$mdp = "";
//nom de la base de donnees
$bd="webcontest";

//connexion au serveur mysql (ici localhost)
$connexion=mysqli_connect($serveur,$login,$mdp,$bd)
or die("Connexion au serveur $serveur impossible pour $login");
	//  Récupération de l'utilisateur et de son pass hashé

	$sql = "SELECT id,mdp FROM personnel WHERE id =".$_POST["id"];
	$id=0;
	$mdp2=0;
	if($requete = mysqli_query($connexion,$sql))
	{
		while($ligne = mysqli_fetch_row($requete)){
			echo $ligne[0];
			$id =  htmlspecialchars($ligne[0]);
			$mdp2 = htmlspecialchars($ligne[1]);
		}

	}
// Comparaison du pass envoyé via le formulaire avec la base

	if (!isset($id)){
		echo 'laMauvais identifiant ou mot de passe !';
	}
	else	{
		$p = $_POST['mdp'];

	//	echo'ici'.htmlspecialchars(p);

		if (htmlspecialchars($p) == $mdp2) {
			$_SESSION['id'] = $id;
			if(preg_match('/search[1-9]/',$_POST["id"])){
				$_SESSION['status'] = "search";
				header('Location: user.php');
			}
			else{
				$_SESSION['status'] = "admin";
				header('Location: admin.php');
			}
		}
		else {
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
}
else{
	echo 'zut';
}

?>
