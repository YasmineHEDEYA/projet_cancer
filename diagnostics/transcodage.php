<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../style/bootstrap.min.css" />
        <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
        <style type="text/css">
       .beige {
    
    margin-top: 10vh;
    margin-bottom: 20vh;
}
    </style>
    <title>Resultat recherche cancer</title>
    <meta name="author" content="Samia Baraka">
</head>

<body class="container-fluid skyblue">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="accueil.php">
   <img src="../_logo .svg" width="30" height="30">
    </a>

  <div class="collapse navbar-collapse">
   <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="../accueil/page_accueil.php">Acceuil</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link" href="diagnostics.php"> Diagnostics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Transcodage CIMO3</a>
      </li>  
    </ul>
  </div>
  <button class="btn btn-info" name = "rechercher" type="button" onclick=window.location.href="recherche_code.php">Rechercher un code</button>
</nav>

            <div class="container" id="affichage">
                <br/>
                    <h3 align="center" class = 'title'>Transcodage CIMO3</h3>
                    <br />
<!--                     <?php //echo "<p>Il y'a ".$ligne1['nbr_ligne']." lignes" ?>
 -->               <table class="table table-bordered table-responsive-md ">
                        <thead>
                            <tr class ="colNames">
                                <th scope="col"><b>ORGANE</th>
                                <th scope="col"><b>CODTOPOCIMO3</th>
                                <th scope="col"><b>GROUPE_TOPO</th>
                                <th scope="col"><b>LESSION</th>
                                <th scope="col"><b>CODMORPHOCIMO3</th>
                                <th scope="col"><b>GROUPE_MORPHO</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        include('../connexion_bd.php'); 

                        /*$req = "SELECT count(*) as nbr_ligne FROM v_anapath  " ;
                        $res=$bdd->query($requete); 
                        $ligne1= $res->fetch();*/

                        $requete= "SELECT * FROM v_anapath LIMIT 15 " ;
                        $resultat=$bdd->query($requete);

                        while($ligne= $resultat->fetch()) {  

                        for ($k=0;$k<6;$k++) {
                        echo '<td>',$ligne[$k], '</td>';

                        }
                        echo "</tr> \n" ;
                                  
                        };
                        $requete->closeCursor() ;
                        ?>
            </div>
</body>
</html>