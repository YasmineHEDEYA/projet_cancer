<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="Mon_css_bootsrap.css" />
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
    
    <div class="container-fluid skyblue">
        <div style="height: 80vh;" class=" row align-items-center">

            <div class="  container beige">
                <br/>
                    <h3 ><strong> RECHERCHE PAR <?php echo strtoupper($_SESSION['critere']); ?> POUR <?php echo strtoupper($_SESSION['recherche']);  ?> </strong></h3>
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
};
 $resultat->closeCursor();
?>
</tbody>
</table>
                   
                    <br />

                    
                        <input class="btn btn-outline-primary " onclick="window.location.href='recherche_cancer.php'" type="submit" name="btnSup" value="Nouvelle Recherche" />
                    
                        
                        <button class="btn btn-outline-primary" onclick="exportTableToCSV('cancers_<?php echo $_SESSION['critere'].'_'.$_SESSION['recherche'] ?>.csv')">Exporter dans un fichier CSV</button>
                        
                        <br/>
                        <br/>     
</div>


             <br />
        </div>
    </div>
    </div>
   
</body>
</html>