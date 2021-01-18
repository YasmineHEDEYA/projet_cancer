
<html>
<head>
	<meta charset="utf-8" />
	<title> Ajouter un patient </title>
  <link rel="stylesheet" href="../style/bootstrap.min.css" />
  <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="accueil.php">
   <img src="_logo .svg" width="30" height="30">
    </a>

  <div class="collapse navbar-collapse">
   <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Diagnostics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../accueil.php">Acceuil</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link" href="mailto:barakasamia2@gmail.com"> Contactez-nous </a>
      </li>  
    </ul>
  </div>
  <button type="button" class="btn btn-info" onclick=window.location.href='../connexion/decnx.php'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
    Déconnexion
</button>
</nav>  
    
<div class="container-fluid skyblue">
        <div  class="row align-items-center">
            <div class="container beige">

<?php
      
  session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=cancer', 'root','');
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dateNaiss = $_POST['dateNaissance'];


  $_SESSION['nom'] = $nom;
  $_SESSION['prenom'] = $prenom;
  $_SESSION['dateNaissance'] = $dateNaiss;

	$requete= "select NOM, PRENOM, DATE_NAISSANCE from tab_patient ";
  $requete2= "select levenshtein(:p_nom, :p_nom2) as diff";
	$resultat = $bdd->prepare($requete);
  $resultat->execute();
	$found=0;
	$ligne = $resultat->fetch();
	while ($ligne  && $found<=0)
  		 {
  		 	$nom2= $ligne['NOM'];
        //$nom2= mysql_real_escape_string($nom2);
  		 	$prenom2=$ligne['PRENOM'];
        $dateNaiss2= $ligne['DATE_NAISSANCE'];
        $_SESSION['nom'] = $nom2;
        $_SESSION['prenom'] = $prenom2;
        $_SESSION['datenaiss'] = $dateNaiss2;
  		 	$resultat_simi=$bdd->prepare($requete2);
        $resultat_simi-> execute(array('p_nom'=>$nom, 'p_nom2'=>$nom2));
        $recup = $resultat_simi->fetch();
  		 	$taux1 = $recup['diff'];
  		 	$resultat_simi=$bdd->prepare($requete2);
        $resultat_simi-> execute(array('p_nom'=>$prenom, 'p_nom2'=>$prenom2));
  		 	$recup = $resultat_simi->fetch();
  		 	$taux2 = $recup['diff'];
        $resultat_simi=$bdd->prepare($requete2);
        $resultat_simi-> execute(array('p_nom'=>$dateNaiss, 'p_nom2'=>$dateNaiss2));
        $recup = $resultat_simi->fetch();
        $taux3 = $recup['diff'];
  		 	if ($taux1<=2 and $taux2<=2 and $taux3==0)
  		 	{
  		 		$found=1;
  		 	}
		    $ligne = $resultat->fetch();

  		 }
  	
  	if ($found ==0)
  	{
  		$bdd->query("insert into tab_patient (nom, prenom,date_naissance) values ('$nom' , '$prenom', '$dateNaiss')");
  		echo "<br/>";
       echo "<br/>";
      echo "Nouveau Patient ajouté";
      echo "<br/>";
      echo "<br/>";
  	}
  	else
  	{
      
      echo "<form method=\"POST\" action=\"reponse_ajout_patient.php\">";
  		echo "<strong>Il existe un patient similaire !</strong>";
      echo "</br>";
      $oui='oui';
      $non='non';
      echo "Voulez-vous vérifier ?";
      echo "</br>";
      echo "<label><input type=\"radio\"  value=\"OUI\" name=\"reponse\" />" ,$oui,"</label><br/> \n";
      echo "<label><input type=\"radio\"  value=\"NON\" name=\"reponse\" />" ,$non,"</label><br/> \n";
      echo "</br>";
      echo "<input class=\"btn btn-info\" type=\"submit\"value=\"ok\"/>";
      echo "</form>";
        		
  	}




?>
<br/>
<form  method="POST" action="../accueil.php">
<input class="btn btn-info" type="submit"value="Retour"/>
  </form>
</div>
</div>
</div>


</body>
</html>