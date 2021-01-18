<?php
session_start();

if($_POST['recherche']!= htmlspecialchars($_POST['recherche'])||strlen($_POST['recherche'])==0){
// eviter d'entrer un champ vide en enlevant "required"
// on utilise html special chars car les patterns peuvent etre enlevès a partir du navigateur

header('Location: erreur_saisie.php');
exit();
} else {
    $_SESSION['recherche']=$_POST['recherche'];
$_SESSION['critere']=$_POST['critere'];
header('Location: resultat_recherche_cancer.php');
exit();
}
?>