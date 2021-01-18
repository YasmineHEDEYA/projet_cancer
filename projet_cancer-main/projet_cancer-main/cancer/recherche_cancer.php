<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../style/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
    
    <title>Rechercher un cancer</title>
</head>

<body>
    <div class="container-fluid skyblue">
        <div  class="row align-items-center">

            <div class="container" id="recherche">
                <br/>
               
                    <h3 class='title'>Rechercher un cancer </h3>
                    <br />
                    <form class="text-center p-4" action="test_recherche.php" method="POST" >
                   <div>
                    <label> Critère  : </label>
                            <select class='custom-select' name="critere" required>
                            <option value="">Choisissez une option</option>
                            <option value="groupe_morpho_iacr">Groupe Morpho </option>
                            <option value="groupe_topo_iacr">Groupe Topo</option>
                            <option value="age">Age patient</option>
                            <option value="ADICAP">Code ADICAP</option>
                            <option value="codtopocimo3">Code CIMO3 Topo</option>
                            <option value="codmorphocimo3">Code CIM03 Morpho</option>
                            <option value="cim10">Code CIM10</option>
                            <option value="libelle">Type Cancer (Libellé)</option>
                            <option value="annee">Année de détection</option>
                            </select>
                     </div>
                        <br /> 
                        <div>
                        <label> Recherche :</label>
                        <input class= "form-group" name="recherche"  pattern="([^\s][A-z0-9À-ž\s]?){1,50}" maxLength='50' type="text" required/> 
                    </div>
                       
                    <br/>
            <input class="btn btn-info " type="submit" name="btnSup" value="Rechercher" />
                        
            <button onclick="window.location.href='accueil_cancer.php'" class="btn btn-info" type="button" >Retour accueil cancer</button>
                 <!-- javascript pour la bouton retour on click event -->
</form>

                    <br/>
                 <br />
            </div>
        </div>
    </div>
  
</body>