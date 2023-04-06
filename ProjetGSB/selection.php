<?php 
session_start();
$mois = date('n');
?>

<!DOCTYPE HTML>
<html class="text-bg-dark p-3">
<head>
        <title>Sélection du mois - GSB</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </head>
	<body class="text-bg-dark p-3">
		<p>Veuillez choisir le mois à afficher.</p>
		<form action="note.php" method="post">
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Mois (1 = janvier, etc.)</label>
				<div class="col-sm-6">
				<input type="number" class="form-control" name="mois" value="<?php echo $mois; ?>" min="1" max="12" step="1">
			</div>
			<div class="offset-sm-3 col-sm-3 d-grid">
				<button type="submit" class="btn btn-primary">Valider</button>
			</div>
		</form>
	</body>
</html>