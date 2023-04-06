<?php session_start(); 


// On vérifie que l'utilisateur est connecté.
if (!isset( $_SESSION['login']) || !isset( $_SESSION['mdp']))
{
	header("location:index.php?error=3");
	exit;
}
else
{
	if (isset($_POST['mois']))
	{
		$_SESSION['mois'] = $_POST['mois'];
	}
}
?>

<!DOCTYPE html>
<html class="text-bg-dark p-3">
    <head>
        <title>Page de connexion - GSB</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		
    </head>
    <header>
        <img src="logo_GSB_64.png" alt="logo">
        <h1>GSB Application Note de Frais
		<a class='btn btn-success btn-sm' href='selection.php'>Changer de mois</a>
		<a class='btn btn-danger btn-sm' href='deconnexion.php'>Se déconnecter</a>
		</h1>
	</header>
    <body style="margin: 50px;" class="text-bg-dark p-3">
	<p> Vous êtes connecté en tant que 
	<?php 
		echo $_SESSION['prenom']; 
	?>
	 
	<?php 
		echo $_SESSION['nom']; 
	?>.
	</p>
		<a class="btn btn-primary" href="create.php" role="button">Nouveau</a>
		<table class="table">
			<thead class="text-bg-dark p-3">
				<tr>
					<!--<th>ID</th> -->
					<th>Visiteur</th>
					<th>Mois</th>
					<th>Nombre justificatifs</th>
					<th>Montant validé</th>
					<th>Date modification</th>
					<th>État</th>
					<th>Édition</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
try
{
	// Connexion à la BDD
	$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM gsbV2.FicheFrais WHERE FicheFrais.mois = ?');
$reponse->execute(array($_SESSION['mois']));

		while ($donnees = $reponse->fetch())
		{
			echo "
				<tr class='text-bg-dark p-3'>
					<!-- <td>$donnees[idFrais]</td> -->
					<td>$donnees[idVisiteur]</td>
					<td>$donnees[mois]</td>
					<td>$donnees[nbJustificatifs]</td>
					<td>$donnees[montantValide]</td>
					<td>$donnees[dateModif]</td>
					<td>$donnees[idEtat]</td>
					<td>";

					if ($donnees['idVisiteur'] == $_SESSION['id'])
					{
						echo "
						<a class='btn btn-primary btn-sm' href='update.php?idFrais=$donnees[idFrais]'>Modifier</a>
						<a class='btn btn-danger btn-sm' href='delete.php?idFrais=$donnees[idFrais]'>Supprimer</a>
						";
					}
					echo 
					"</td>
				</tr>";
		}
		
		$reponse->closeCursor();
	?>

			</tbody>
		
		</table>
    </body>
</html>
