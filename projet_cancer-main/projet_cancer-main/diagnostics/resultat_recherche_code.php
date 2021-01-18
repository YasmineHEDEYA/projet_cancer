<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Samia Baraka">
    <link rel="stylesheet" href="../style/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />
    <title>Resultat recherche code</title>
</head>

<body>
    
    <div class="container-fluid skyblue">

            <div class="container " id="resultat">
                <br/>
                    <h3 class='title' >Recherche par  <?php echo ($_POST['critere']);?> </h3>
                    <br />
                    <table style="max-height: 400px; display: block;overflow-y: scroll;"
                      class="sortable  table table-hover table-bordered table-responsive-md">
>
                       <thead> 
                        <?php
                        include('manipulation_transcodage.php');
                        ?>
                        </tbody>
                    </table>
                    <br />
                    <input class="btn btn-info " type="button"  value="Nouvelle Recherche" onclick=window.location.href="recherche_code.php" />
                    <br />
            </div><br />
        </div>
    </div><br />
   
</body>
</html>