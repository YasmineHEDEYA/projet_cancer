<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Samia Baraka">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
    
    
</head>

<body class="container-fluid skyblue">	
			<div class="row justify-content-md-center h-100" style="padding-top: 50px;" >
				<div class="card-wrapper">
					
					<div class="card fat" >
						<div class="card-body">
							<div class="brand">
						<img src="../style/_logo .svg" width="250" height="200" style="padding-left: 50px;">
					</div>
							<h4 style = "padding-left: 100px;" class="title">Inscription</h4><br/><br />
							<form method="POST" action="cnx_utilisateur.php">
								<div class="form-group">
									<input id="nom" type="text" class="form-control" name="nom" placeholder="Nom" required autofocus>
								</div>

								<div class="form-group">
									
									<input type="text" class="form-control" name="utilisateur" placeholder="Identifiant" required>
								</div>

								<div class="form-group">
								
									<input  type="password" class="form-control" name="mdp"  minlength="6" maxlength="15" placeholder="Mot de passe" required>
								</div><br />

								<div class="form-group m-0" style="padding-left: 50px;">
									<button type="submit" class="btn btn-info btn-block" name='inscrire'>
										S'inscrire
									</button>
								</div>
								<div class="mt-4 text-center">
									Vous avez déjà un compte ? <a href="login.php">Se connecter</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
</body>
</html>