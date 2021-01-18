
<?php
// se connecter à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cancer', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
};
?>
