<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../style/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
    <style type="text/css">
       .container {
    
    margin-top: -15vh;
    margin-bottom: -50vh;
}
    </style>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script>
        function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");

        // File name
        downloadLink.download = filename;

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Hide download link
        downloadLink.style.display = "none";

        // Add the link to DOM
        document.body.appendChild(downloadLink);

        // Click download link
        downloadLink.click();
     }
        function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table tr");
        
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");
            
            for (var j = 0; j < cols.length; j++) 
                row.push(cols[j].innerText);
            
            csv.push(row.join(","));        
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
        }
    </script>
    <title>Resultat recherche cancer</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="accueil.php">
   <img src="../style/_logo .svg" width="30" height="30">
    </a>

  <div class="collapse navbar-collapse">
   <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#">Résultat de recherche de cancer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../accueil.php">Acceuil</a>
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
        <div  class=" row align-items-center">

            <div class="  container ">
                <br/>
                    <h3 class='title'> Recherche par <?php echo strtoupper($_SESSION['critere']); ?> pour <?php echo strtoupper($_SESSION['recherche']);  ?> </h3>
                    <br />
                    <?php

try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};

    if($_SESSION['critere']=='age')
        $requete = 'SELECT * FROM `cancer`join tab_patient on cancer.newid=tab_patient.id where (year(now())-year(date_naissance))='.$_SESSION['recherche'].';';
    else if ($_SESSION['critere']=='ADICAP'||$_SESSION['critere']=='cim10'||$_SESSION['critere']=='libelle')
        $requete='';
    else if ($_SESSION['critere']=='annee')
    $requete = 'SELECT * FROM `cancer` where year(date)="'.$_SESSION['recherche'].'" ;';
    else
        $requete = 'SELECT * FROM `cancer` where '.$_SESSION['critere'].' like "%'.$_SESSION['recherche'].'%";';

    $resultat = $bdd->query($requete);
    $ligne = $resultat->fetch();
    $nb=0;
// // affichage des  cancers
echo '<table style="max-height: 400px;
display: block;
overflow-y: scroll;"class="sortable  table table-hover table-bordered table-responsive-md ">';
echo '<thead>
<tr>
  <th scope="col">Patient</th>
  <th scope="col">Année de detection</th>
  <th scope="col">Code topo CIMO3</th>
  <th scope="col">Groupe topo IACR</th>
  <th scope="col">Code morpho</th>
  <th scope="col">Groupe morpho IACR</th>
  <th scope="col">Foce du diagnostic</th>
</tr>
</thead>
<tbody>';
 while ($ligne) {

    echo '<tr><td>'. $ligne[1].'</td><td>'. substr($ligne[2],0,4).'</td><td>'. $ligne[3].'</td><td>'. $ligne[4].'</td><td>'. $ligne[5] .'</td><td>'. $ligne[6].'</td><td>'. $ligne[7].'</td></tr>';
    $ligne = $resultat->fetch();
    $nb=$nb+1;
};
 $resultat->closeCursor();
?>
</tbody>
</table>
<?php echo "<h3>nombre de lignes: ".$nb."</h3>"; ?>
                   
                    <br />

                    
                        <input class="btn btn-info " onclick="window.location.href='recherche_cancer.php'" type="submit" name="btnSup" value="Nouvelle Recherche" />
                    
                        
                        <button class="btn btn-info" onclick="exportTableToCSV('cancers_<?php echo $_SESSION['critere'].'_'.$_SESSION['recherche'] ?>.csv')">Exporter en CSV</button>
                        
                        <br/>
                        <br/>     
</div>


             <br />
        </div>
    </div>
    </div>
   
</body>
</html>