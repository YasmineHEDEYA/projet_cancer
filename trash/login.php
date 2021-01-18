<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Yasmine Hedeya">
    <link rel="stylesheet" href="style/bootstrap.min.css" />
    <link rel="stylesheet" href="style/Mon_css_bootsrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
       .beige {
    height: 95vh;
    width: 60vh;
    margin-top: -20vh;
    margin-bottom: 10vh;
}
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <title>Login</title>
</head>

<body>
 
    <div class="container-fluid skyblue">
    <div class="row align-items-center">
<div class="container beige">
        <form class="text-center p-4" action="test_cnx.php" method="POST" >
            
            <img src="_logo .svg" width=300px height=300px/>
            <legend>
                <h4 class= 'title' >CONNEXION</h4>
            </legend>
            <br />
            <input type="text" class="form-control" placeholder="Utilisateur*" name='utilisateur' required>
            <br />
            <input type="password" class="form-control" placeholder="Mot de passe*" name='mdp' required>
            <br />
            
            <p class="float-sm-left">* Information requise</p>
            <br />
            <br/>
            
            <div class="h-captcha" data-sitekey="b79d465d-7901-47ce-b505-3a741e73d2f0"></div>
            <br/>
            <button class="btn btn-info" type="submit" >Se connecter</button>
        </form>
        <br />
    </div>
    </div></div>
</body>

</html>