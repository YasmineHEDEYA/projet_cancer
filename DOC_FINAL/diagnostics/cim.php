  
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
    <title>Problemes  CIM10</title>
    <meta name="author" content="Samia Baraka">
</head>
 
<body class="container-fluid skyblue">

            <div class="container" id="affichage">
                <br/>
                    <h3 align="center" class = 'title'>Problemes CIM10</h3>
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
						
						
						  $req= $bdd->prepare('SELECT * FROM CIM10');
        $req->execute();

        while ($ligne =$req->fetch()) {  

            for ($k=0;$k<6;$k++) {
              echo '<td>',$ligne[$k], '</td>';
              }

            echo "</tr> \n" ;
            
          };
        $req->closeCursor() ;
      ?>

                      
            </div>
</body>
</html>