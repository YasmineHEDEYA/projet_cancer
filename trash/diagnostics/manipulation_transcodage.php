<!DOCTYPE html>
<html>
<head>
	<title>Traitement des données...</title>
</head>
<body>
<?php 

include('../connexion_bd.php'); 

 if(isset($_POST['recherche_code'])) {

	if($_POST['critere'] == "code_organe") {

		echo ("code tapé est  ".$_POST['code']); 
		echo ("  le critre choisé est :  ".$_POST['critere']); 

   // ON VERIFIE SI LE CODE EXISTE DANS LA TABLE 
	  $req =$bdd->prepare('SELECT COUNT(*) AS nbr FROM v_anapath WHERE ORGANE LIKE :p_code');
	  $req->execute(array(':p_code' => $_POST['code']));
	  $ligne = $req->fetch() ;
	  
	  if(!($ligne['nbr'] == 0)){

	    echo "
			<tr class ='colNames'>
	            <th scope='col'><b>ORGANE</th>
	            <th scope='col'><b>CODTOPOCIMO3</th>
	            <th scope='col'><b>GROUPE_TOPO</th>
				<th scope='col'><b>LESSION</th>
	            <th scope='col'><b>CODMORPHOCIMO3</th>
	            <th scope='col'><b>GROUPE_MORPHO</th>
	        </tr>
	     </thead>
	     <tbody>";

    $req->closeCursor() ;
    	$req = $bdd->prepare('SELECT * FROM v_anapath WHERE ORGANE LIKE :p_code');
        $req->execute(array(':p_code' => $_POST['code']));

		  $i=1; 
		  while ($ligne = $req->fetch())
		     {  
		     
		      for ($k=0;$k<6;$k++)
		        {
		        echo '<td>',$ligne[$k], '</td>';
		        }
		      echo "</tr> \n" ;
		    }
		    $req->closeCursor() ;
    }
    else {
        echo "<div class='alert alert-danger' role='alert'>
        Aucun code n'a été trouvé !
        </div>" ;
    }
    }

    if ($_POST['critere'] == 'code_lesion') {

     // ON VERIFIE SI LE CODE EXISTE DANS LA TABLE 
	  $req =$bdd->prepare('SELECT COUNT(*) AS nbr FROM v_anapath WHERE LESION LIKE :p_code');
	  $req->execute(array(':p_code' => $_POST['code']));
	  $ligne = $req->fetch() ;
	  
	  if(!($ligne['nbr'] == 0)){

	    echo "
			<tr class ='colNames'>
	            <th scope='col'><b>ORGANE</th>
	            <th scope='col'><b>CODTOPOCIMO3</th>
	            <th scope='col'><b>GROUPE_TOPO</th>
				<th scope='col'><b>LESSION</th>
	            <th scope='col'><b>CODMORPHOCIMO3</th>
	            <th scope='col'><b>GROUPE_MORPHO</th>
	        </tr>
	     </thead>
	     <tbody>";

    $req->closeCursor() ;
    	$req = $bdd->prepare('SELECT * FROM v_anapath WHERE LESION LIKE :p_code');
        $req->execute(array(':p_code' => $_POST['code']));

		  $i=1; 
		  while ($ligne = $req->fetch())
		     {  
		     
		      for ($k=0;$k<6;$k++)
		        {
		        echo '<td>',$ligne[$k], '</td>';
		        }
		      echo "</tr> \n" ;
		    }
		    $req->closeCursor() ;
    }
    else {
        echo "<div class='alert alert-danger' role='alert'>
        Aucun code n'a été trouvé !
        </div>" ;
    }
    }

    if ($_POST['critere'] == 'cimo3_topo') {

    // ON VERIFIE SI LE CODE EXISTE DANS LA TABLE 
	  $req =$bdd->prepare('SELECT COUNT(*) AS nbr FROM v_anapath WHERE CODTOPOCIMO3 LIKE :p_code');
	  $req->execute(array(':p_code' => $_POST['code']));
	  $ligne = $req->fetch() ;
	  
	  if(!($ligne['nbr'] == 0)){

	    echo "
			<tr class ='colNames'>
	            <th scope='col'><b>ORGANE</th>
	            <th scope='col'><b>CODTOPOCIMO3</th>
	            <th scope='col'><b>GROUPE_TOPO</th>
				<th scope='col'><b>LESSION</th>
	            <th scope='col'><b>CODMORPHOCIMO3</th>
	            <th scope='col'><b>GROUPE_MORPHO</th>
	        </tr>
	     </thead>
	     <tbody>";

    $req->closeCursor() ;
    	$req = $bdd->prepare('SELECT * FROM v_anapath WHERE CODTOPOCIMO3 LIKE :p_code');
        $req->execute(array(':p_code' => $_POST['code']));

		  $i=1; 
		  while ($ligne = $req->fetch())
		     {  
		     
		      for ($k=0;$k<6;$k++)
		        {
		        echo '<td>',$ligne[$k], '</td>';
		        }
		      echo "</tr> \n" ;
		    }
		    $req->closeCursor() ;
    }
    else {
        echo "<div class='alert alert-danger' role='alert'>
        Aucun code n'a été trouvé !
        </div>" ;
    }
    }

    if ($_POST['critere'] == 'cimo3_morpho') {

      // ON VERIFIE SI LE CODE EXISTE DANS LA TABLE 
	  $req =$bdd->prepare('SELECT COUNT(*) AS nbr FROM v_anapath WHERE CODMORPHOCIMO3 LIKE :p_code');
	  $req->execute(array(':p_code' => $_POST['code']));
	  $ligne = $req->fetch() ;
	  
	  if(!($ligne['nbr'] == 0)){

	    echo "
			<tr class ='colNames'>
	            <th scope='col'><b>ORGANE</th>
	            <th scope='col'><b>CODTOPOCIMO3</th>
	            <th scope='col'><b>GROUPE_TOPO</th>
				<th scope='col'><b>LESSION</th>
	            <th scope='col'><b>CODMORPHOCIMO3</th>
	            <th scope='col'><b>GROUPE_MORPHO</th>
	        </tr>
	     </thead>
	     <tbody>";

    $req->closeCursor() ;
    	$req = $bdd->prepare('SELECT * FROM v_anapath WHERE CODMORPHOCIMO3 LIKE :p_code');
        $req->execute(array(':p_code' => $_POST['code']));

		  $i=1; 
		  while ($ligne = $req->fetch())
		     {  
		     
		      for ($k=0;$k<6;$k++)
		        {
		        echo '<td>',$ligne[$k], '</td>';
		        }
		      echo "</tr> \n" ;
		    }
		    $req->closeCursor() ;
    }
    else {
        echo "<div class='alert alert-danger' role='alert'>
        Aucun code n'a été trouvé !
        </div>" ;
    }
   }

}


?>
</body>
</html>