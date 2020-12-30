<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="Mon_css_bootsrap.css" />
    <link rel="stylesheet" href="dist/sortable-tables.min.css">
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
    <title>Registre des cancers</title>
</head>
<body>
    <div class="container-fluid skyblue">
        <div style="height: 80vh;" class="row align-items-center">
            <div class="container beige">
            <br />
                    <h3><strong> LES CANCERS </strong></h3>
                    <br />
                    <div>
                    <?php

    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                    
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
//test
    $requete = 'SELECT * FROM `cancer`;';
    $resultat = $bdd->query($requete);
    $ligne = $resultat->fetch();
   
    // // affichage de tous les  cancers
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
                    </div>
                    
                    <p>
                        <input class="btn btn-outline-primary " onclick="window.location.href='accueil_cancer.php'"type="submit" name="btnSup" value="RETOUR" />
                    </p>
                    <button class="btn btn-outline-primary" onclick="exportTableToCSV('tous_les_cancers.csv')">Exporter dans un fichier CSV</button>
                <br />
            </div>
            
        </div>
        <br/> 
    </div>
    
</body>