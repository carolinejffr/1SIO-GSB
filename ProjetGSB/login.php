    <?php
    // Note : ces identifiants ne fonctionnent pas car ils sont instantanément remplacés par le contenu de la BDD.
	// Ils sont juste là parce que si on laisse vide il y a des erreurs.
    $login_valide = "placeholder";
    $mdp_valide = "placeholder";
	
	try
	{
		// Connexion à la BDD
		$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	// Vérification du login
	$reponse = $bdd->prepare('SELECT * FROM gsbV2.Visiteur WHERE login = ?');
	$reponse->execute(array($_POST['login']));
	if ($reponse->rowCount() > 0)
	{
		$login_valide = $_POST['login'];
	}
	else
	{
		$login_valide = "";
	}
	
	// Vérification du mot de passe
	$reponse = $bdd->prepare('SELECT * FROM gsbV2.Visiteur WHERE mdp = ?');
	$reponse->execute(array($_POST['mdp']));
	if ($reponse->rowCount() > 0)
	{
		$mdp_valide = $_POST['mdp'];
	}
	else
	{
		$login_valide = "";
	}

	

    if (isset($_POST['login']) && isset($_POST['mdp'])) {
		
		if ($_POST['login'] == "" || $_POST['mdp'] == "")
		{
			header("location:index.php?error=1");
			exit;
		}
		else
		{
			if ($login_valide == $_POST['login'] && $mdp_valide == $_POST['mdp']) {

    		session_start();
    		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
    		$_SESSION['login'] = $_POST['login'];
    		$_SESSION['mdp'] = $_POST['mdp'];
			// Récupération de l'ID
			$reponse = $bdd->prepare('SELECT id FROM gsbV2.Visiteur WHERE login = ?');
			$reponse->execute(array($_POST['login']));
			$_SESSION['id'] = $reponse->fetch()[0];
			// Récupération du nom
			$reponse = $bdd->prepare('SELECT nom FROM gsbV2.Visiteur WHERE login = ?');
			$reponse->execute(array($_POST['login']));
			$_SESSION['nom'] = $reponse->fetch()[0];
			// Récupération du prénom
			$reponse = $bdd->prepare('SELECT prenom FROM gsbV2.Visiteur WHERE login = ?');
			$reponse->execute(array($_POST['login']));
			$_SESSION['prenom'] = $reponse->fetch()[0];
			
			
    		// on redirige notre visiteur vers une page de notre section membre
    		header ('location:selection.php');
			exit;
    	}
    	else {
    		header("location:index.php?error=2");
			exit;
    	}
		}


    }
    else {
		header("location:index.php?error=1");
		exit;
    }
    ?>
