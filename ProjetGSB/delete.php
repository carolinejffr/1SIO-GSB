<?php session_start(); 

// On vérifie que l'utilisateur est connecté.
if (!isset( $_SESSION['login']) || !isset( $_SESSION['mdp']))
{
	header("location:index.php?error=3");
	exit;
}
if ( isset($_GET["idFrais"]) ) 
{
	try
	{
		// Connexion à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	$reponse = $bdd->prepare('DELETE FROM gsbV2.FicheFrais WHERE idFrais = ?');
	$reponse->execute(array($_GET['idFrais']));
}

header("location:note.php");
exit;

?>
