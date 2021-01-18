<?php
session_start();

include('connexion_bd.php');

// inscription 

if(isset($_POST['inscrire'])) {

    // ON VERIFIE SI IDENTIFIANT  EXISTE  DEJA DANS LA TABLE AVANT L'INSERTION
    $req =$bdd->prepare('SELECT COUNT(*) AS nbr FROM utilisateur WHERE IDENTIFIANT= :p_iduser'); 
    $req->execute(array(':p_iduser' => $_POST['utilisateur']));
    $ligne = $req->fetch() ;

    if(!($ligne['nbr'] == 0)){

    echo "<div class='alert alert-danger' role='alert'>
    Ce Identifiant existe déja ! <a href='inscription.php' class='alert-link'> Essayez à nouveau</a>
    </div>" ;
      }

    else {

    $req = $bdd->prepare('INSERT INTO utilisateur(IDENTIFIANT,MDP,NOM_UTILISATEUR) VALUES(:p_iduser, :p_mdp, :p_nom)'); 
		$req->execute(array(
			':p_iduser' => $_POST['utilisateur'],
			':p_mdp' => $_POST['mdp'],
			':p_nom' => $_POST['nom']));

	    header('location:login.php');
	
    }
$req->closeCursor() ;  

};

// changement de mot de passe
if(isset($_POST['change_mdp'])) {

$req = $bdd->prepare('SELECT MDP FROM utilisateur WHERE IDENTIFIANT= :p_iduser');

$req->execute(array(':p_iduser' => $_POST['utilisateur']));


$ligne = $req->fetch();  

  
if ($ligne) {

  if($_POST['mdp']==$ligne['MDP'] AND $_POST['nv_mdp']==$_POST['confirm_mdp'] AND $_POST['nv_mdp'] <> '') {

$req2 = $bdd->prepare('UPDATE utilisateur SET MDP= :p_mdp WHERE IDENTIFIANT= :p_iduser');

$req2->execute(array(':p_iduser' => $_POST['utilisateur'] , ':p_mdp' => $_POST['nv_mdp']));

echo "<div class='alert alert-info' role='alert'>
 BRAVO ! votre mot de passe a bien été changé
</div>" ;
echo "<button class='btn btn-info' onclick=window.location.href='login.php'>Retour</button>";
 
  }
    else {

    echo "<div class='alert alert-danger' role='alert'>
     Erreur <a href='mdp_oublie.php' class='alert-link'> Essayez à nouveau</a> ";
    }
} 
else  { 

     echo "<div class='alert alert-danger' role='alert'>
     Utilisateur inconnu <a href='login.php' class='alert-link'> Essayez à nouveau</a> ";
    }
$req->closeCursor() ;

}; 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Vérification...</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="cnx.css"> 

</head>
<body class="my-login-page">
</body>
</html>