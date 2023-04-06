<?php
$errorMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' )
{

	
	if (isset($_GET["error"]) )
	{
		if ($_GET["error"] == 1)
		{
			$errorMessage = "Veuillez remplir le formulaire.";
		}
		if ($_GET["error"] == 2)
		{
			$errorMessage = "Login ou mot de passe incorrect.";
		}
		if ($_GET["error"] == 3)
		{
			$errorMessage = "Veuillez vous connecter.";
		}
		
	}
}
?>
<!DOCTYPE html>
<html class="text-bg-dark p-3">
    <head>
        <title>Page de connexion - GSB</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</head>
    <header>
        <img src="logo_GSB_64.png" alt="logo">
        <h1>GSB Application Note de Frais</h1>
    </header>
    <body class="text-bg-dark p-3">
	<?php
	if (!empty($errorMessage))
	{
		echo "
		<div class='alert alert-warning alert-dismissible fade show' role='alert'>
			<strong>$errorMessage</strong>
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		</div>	
		";
	}
	?>
        <h2>Bienvenue.</h2>
        <form action="login.php" method="post">
            <label for="login">Login:</label><br>
            <input type="text" id="login" name="login" value=""><br>
            <label for="mdp">Mot de passe:</label><br>
            <input type="password" id="mdp" name="mdp" value=""><br><br>
            <input type="submit"  class="btn btn-success" value="Connexion">
        </form> 
    </body>
    
    <footer>
        <h5>GSB - Galaxy Swiss Bourdin. Tous droits réservés. EST. 2023</h5>
    </footer>

</html>