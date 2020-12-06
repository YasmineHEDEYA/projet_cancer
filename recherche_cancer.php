<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="Mon_css_bootsrap.css" />
    <title>Rechercher un cancer</title>
</head>

<body>
    <div class="container-fluid skyblue">
        <div style="height: 80vh;" class="row align-items-center">

            <div class="container beige ">
                <br/>
               
                    <h3><strong> RECHERCHER UN CANCER </strong></h3>
                    <br />
                    <label> Critère  : </label>
                            <select class= "form-group">
                            <option>Groupe Morpho</option>
                            <option>Groupe Topo</option>
                            <option>Age patient</option>
                            <option>Code Adicap</option>
                            <option>Code CIM O3 Topo</option>
                            <option>Code CIM 03 Morpho</option>
                            <option>Code CIM 10</option>
                            <option>Type Cancer (Libellé)</option>
                            <option>Année de détection</option>
                            </select>
                    
                        <label> Recherche :</label> <input class= "form-group" name="declaration" type="text"/> 
                    
                    <br/>
                    <br/>
                        <input class="btn btn-outline-primary "  onclick="window.location.href='resultat_recherche_cancer.php'"type="submit" name="btnSup" value="RECHERCHER" />
                   
                    </article>

                    <br/>
                 <br />
            </div>
        </div>
    </div>
  
</body>