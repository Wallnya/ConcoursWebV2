<?php
  session_start();
  if(isset($_GET['id']) ){
  	$login=$_GET['id'];
  	$reg = '/search[5-9]/';
    $connexion = mysqli_connect("localhost","root","")
    or die ("Tu es nul. Recommence.");
    // $connexion = mysqli_connect("localhost","g1","")
    // or die ("Tu es nul. Recommence.");

    $bd="webcontest";

    mysqli_select_db($connexion,$bd)
    or die ("Toujours pas.");
    if(preg_match($reg,$login)){
      // suppressions
      $requete = $connexion -> prepare("DELETE FROM Personnel WHERE id LIKE ?");

      $requete->bind_param("s",$login);
      $requete -> execute();
      $requete->close();
    }
    mysqli_close($connexion);

  }
  header('Location: admin.php');


?>
