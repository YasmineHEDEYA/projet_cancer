<html>

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Samia Baraka">
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
   <img src="../style/logo.svg" width="40" height="40">
    </a>

  <div class="collapse navbar-collapse">
   <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="../accueil.php">Acceuil</a>
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
                    <h3 align="center" class = 'title'>TRANSCODAGE CIMO3</h3>
                    <br />

                   <table style="max-height: 400px; display: block;overflow-y: scroll;"
                      class="sortable  table table-hover table-bordered table-responsive-md">

                        <thead>
                            <tr class ="colNames">
                                <th scope="col">CIM10</th>
                                <th scope="col">CODTOPOCIMO3</th>
                                <th scope="col">LIBTOPOCIMO3</th>
                                <th scope="col">GROUPE_TOPO</th>
                                <th scope="col">CODMORPHOCIMO3</th>
                                <th scope="col">LIBMORPHOCIMO3</th>
                                <th scope="col">GROUPE_MORPHO</th>
                                <th scope="col">ORGANE</th>
                                <th scope="col">LESSION</th>
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