<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

header('location:login.php');    	
	   
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="author" content="Samia">
  <meta name="viewport" content="width=device-width,initial-scale=1">	
  <title>Vérification...</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/bootstrap.min.css" />
  <link rel="stylesheet" href="../style/Mon_css_bootsrap.css" />

</head>
<body>
</body>
</html>