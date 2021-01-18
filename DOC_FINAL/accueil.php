<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Yasmine Hedeya">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style/Mon_css_bootsrap.css" />
    <title>Diagnostics</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="accueil.php">
   <img src="./style/logo.svg" width="50" height="50">
    </a>
    
  <div style="padding-left: 1130px;">
  <button type="button" class="btn btn-info" onclick=window.location.href='./connexion/decnx.php'>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
            <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
    Déconnexion
</button>
</div>
</nav>
    <div class="container-fluid skyblue">
        <div  class="row align-items-center">
            <div class="container beige">
                  <br />
                      <h3 class = 'title'>BIENVENUE DANS CANCULATE</h3>
                      <br />
                      <br/>
                      <div class="row">
                          <div class="col">
                              <input  class="btn btn-info " type="submit" name="anapath" onclick=window.location.href="patient/identitovigilance.html" value="Identitovigilance" />
                          </div>
                      </div><br />
                      <div class="row">
                          <div class="col">
                              <input  class="btn btn-info " type="submit" name="anapath" onclick=window.location.href="diagnostics/diagnostics.php" value="Diagnostics" />
                          </div>
                      </div><br />
                       <div class="col">
                              <input  class="btn btn-info " type="submit" name="anapath" onclick=window.location.href="cancer/accueil_cancer.php" value="Cancers" />
                          </div><br />

                           
                      <br />
            </div>
        </div>
        <br/> 
    </div>
    
</body>