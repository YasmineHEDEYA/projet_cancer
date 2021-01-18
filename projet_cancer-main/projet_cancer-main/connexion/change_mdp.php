<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Samia Baraka">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Reinitialiser le mot de passe</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
	

<body class="container-fluid skyblue">
			<div class="row justify-content-md-center align-items-center h-100" style="padding-top: 50px;">
				<div class="card-wrapper" >
					<div class="card fat">
						<div class="card-body">
							<h4 class="title" style="padding-left: 80px;">Changement de mot de passe </h4>
							<form method="POST" action="cnx_utilisateur.php"><br /><br/>
							
								<div class="form-group">
									<label>Identifiant</label>
									<input  type="text" class="form-control" name="utilisateur" required autofocus>
								</div>

								<div class="form-group">
									<label>Ancien mot de passe</label>
									<input  type="password" class="form-control" name="mdp" minlength="6" maxlength="15" required autofocus>
								</div>

								<div class="form-group">
									<label>Nouveau mot de passe</label>
									<input  type="password" class="form-control" name="nv_mdp" minlength="6" maxlength="15" required autofocus>
						        </div>

								<div class="form-group">
									<label>Confirmer le nouveau mot de passe</label>
									<input  type="password" class="form-control" name="confirm_mdp" minlength="6" maxlength="15" required autofocus>
									<div class="form-text text-muted">
										Assurez-vous que votre mot de passe est solide et facile à retenir.
									</div>
								</div><br/><br/>

								<div style="padding-left: 50px;">
									<button type="submit" class="btn btn-info" name='change_mdp'>
										Valider 
									</button>
									<button type="button" class="btn btn-info" onclick=window.location.href='login.php'>
									Retour 
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>