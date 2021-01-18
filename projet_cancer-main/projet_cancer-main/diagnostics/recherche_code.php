<!DOCTYPE html>
<html>
<head>
	<title>Recherche d'un code</title>
    <meta name="author" content="Samia Baraka">
	<link rel="stylesheet" href="../style/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />


</head>
<body class="container-fluid skyblue">
 
    <div class="row align-items-center">

            <div class="container " id="recherche">
                <br/>
                <form action="resultat_recherche_code.php" method="POST"> 
                    <h3 align="center" class = 'title'><strong> Rechercher un code </strong></h3>
                    <br />
                    <div>
                    <label> Critère  : </label>
                            <select class='custom-select' required name="critere">
                            <option value=''selected>Choisissez  le type du code</option>
                            <option value="code_organe">Code Adicap Organe</option>
                            <option value="code_lesion">Code Adicap Lésion</option>
                            <option value="cimo3_topo">Code CIM O3 Topo</option>
                            <option value="cimo3_morpho">Code CIM 03 Morpho</option>
                             <option value="cimo10">Code CIM 10</option>
                            </select>
                    </div><br />

                    <div>
                        <label> Code :</label>
                        <input class= "form-group" name="code" type="text" minlength="2" maxlength="6" placeholder="Exemple : C069" required/> 
                    </div>
                    <br/>

                    <input class="btn btn-info " type="submit" name="recherche_code" value="Rechercher" />
                      <input class="btn btn-info " type="button" value="Retour" onclick=window.location.href="diagnostics.php" />
                   </form>
                    <br/>
            </div>
        </div>
</body>
</html>