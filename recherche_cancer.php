<html>

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style/Mon_css_bootsrap.css" />
    
    <title>Rechercher un cancer</title>
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
        <a class="nav-link" href="accueil.php">Acceuil</a>
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

            <div class="container beige ">
                <br/>
               
                    <h3 class='title'>RECHERCHER UN CANCER </h3>
                    <br />
                    <form class="text-center p-4" action="test_recherche.php" method="POST" >
                    <label> Critère  : </label>
                            <select class= "form-group" name="critere" required>
                            <option value=""></option>
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
                    
                        <label> Recherche :</label> <input class= "form-group" name="recherche"  pattern="([^\s][A-z0-9À-ž\s]?){1,50}" maxLength='50' type="text" required/> 
                    
                    <br/>
                    <br/>
                        <input class="btn btn-info " type="submit" name="btnSup" value="RECHERCHER" />
                        
</br>
</br>
<button onclick="window.location.href='accueil_cancer.php'" class="btn btn-info" type="button" >Retour accueil cancer</button>
                 <!-- javascript pour la bouton retour on click event -->
</form>

                    <br/>
                 <br />
            </div>
        </div>
    </div>
  
</body>