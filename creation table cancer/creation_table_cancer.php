<?php
set_time_limit(50000);
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                    
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
//test
    // $requete = 'SELECT * FROM `table_union`;';
    // $resultat = $bdd->query($requete);
    // $ligne = $resultat->fetch();
    // // affichage de tous les diagnostics( avec et sans anapath)pour le calcul des cancers
    // echo '<table>';
    // while ($ligne) {

    //     echo '<tr><td>'. $ligne[0].'</td><td>'. $ligne[1].'</td><td>'. $ligne[2].'</td><td>'. $ligne[3].'</td><td>'. $ligne[4] .'</td></tr>';
    //     $ligne = $resultat->fetch();
    // };
    // $resultat->closeCursor();

    //$req='truncate cancer;';
    //$resultat=$bdd->query($req);
    //$req1='truncate test;';
    //$resultat1=$bdd->query($req1);
// parcours des patients
    $requete = 'SELECT distinct newid FROM `table_union` order by newid;';
    $resultat = $bdd->query($requete);
    $ligne = $resultat->fetch();
    while ($ligne){
        $patient= $ligne['newid'];
        //traitement pour chaque patient
        cancersystemique($patient);
        recupmorpho($patient);
        $ligne = $resultat->fetch();
    };
    $resultat->closeCursor();

function cancersystemique($patient){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));           
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1 = 'insert into cancer( SELECT distinct*  FROM `table_union` where newid="'.$patient.'" and GROUPE_MORPHO_IACR BETWEEN 8 and 15 group by newid,GROUPE_MORPHO_IACR); ';
    $resultat1 = $bdd->query($requete1);
}
function recupmorpho($patient){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct codmorphocimo3 from table_union where newid="'.$patient.'"and codmorphocimo3!="NA"and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1 = $bdd->query($requete1);
    $ligne1 = $resultat1->fetch();
    while ($ligne1){
    $codemorpho= $ligne1[0];
    //on a recupéré tous le codes 
    // traitement pour chaque code
    morpho($patient,$codemorpho);
    $ligne1 = $resultat1->fetch();
    };
    $resultat1->closeCursor();
}
function morpho($patient,$codemorpho){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));          
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*)from table_union where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if ($ligne1[0]>1) {
        //meme morpho
        recuptopo($patient, $codemorpho); 
    }
    else{
        //differentes morpho
        recupgroupemorpho($patient);
    }
    $resultat1->closeCursor();  
}
function recuptopo($patient,$codemorpho){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct groupe_topo_iacr from table_union where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    while ($ligne1){
        $groupetopo=$ligne1[0];
        topo($patient,$codemorpho,$groupetopo);
        //on a recupéré tous le codes 
        // traitement pour chaque code
        $ligne1 = $resultat1->fetch();
    };
    $resultat1->closeCursor();
}
function topo($patient, $codemorpho, $groupetopo){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*)from table_union where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if ($ligne1[0]>1) {
        $requete2='insert into test SELECT distinct*  FROM `table_union` where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'"group by newid,codmorphocimo3,groupe_topo_iacr;';
        $resultat2 = $bdd->query($requete2);
        dates($patient,$codemorpho,$groupetopo);
    }
    else{
        $requete2='insert into test3 select * from table_union where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
        $resultat2=$bdd->query($requete2);
    }
    $resultat1->closeCursor();
}
function dates($patient,$codemorpho,$groupetopo){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*) from test where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14 group by newid,codmorphocimo3,groupe_topo_iacr;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if($ligne1[0]>1){
       $k= selectcodtopo($patient,$codemorpho,$groupetopo);
        
        if($k!=''){
            $requete2='insert into test1 select distinct* from test where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;
            update test1 set codtopocimo3='.$k.' where  newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
            $resultat2=$bdd->query($requete2);
        }
        else{
            $requete2='insert into test1 select distinct* from test where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
            $resultat2=$bdd->query($requete2);
        }
        //changer le code si diagnostiqué en meme temps et si le code existe dans la table 2
    }
    else{
        //on prend le code topo du 1er diagnostic
        $requete2='insert into test2 SELECT distinct* FROM `test` where GROUPE_MORPHO_IACR not BETWEEN 8 and 14 group by newid,CODMORPHOCIMO3,GROUPE_TOPO_IACR having DATE=max(DATE);';
        $resultat2=$bdd->query($requete2);
    }
    $resultat1->closeCursor();
}
function selectcodtopo($patient,$codemorpho,$groupetopo){
    $k='';
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select * from test where newid="'.$patient.'" and codmorphocimo3="'.$codemorpho.'" and groupe_topo_iacr="'.$groupetopo.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14 group by newid,codmorphocimo3,groupe_topo_iacr;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    while ($ligne1){
    $test =substr($ligne1[2],0,3);
    switch ($test) {
    case "C01":
        case "C02":
      $k= "C029";
      break;
    case"C00":
    case"C03": 
    case"C04":
    case"C05": 
    case"C06":
      $k="C069";
      break;
    case"C09":
    case"C10":
    case"C12":
    case"C13":
    case"C14":
      $k="C140";
      break;
    case"C19":
    case "C20":
        $k="C209";
        break;
    case "C23":
    case"C24":
        $k="C249";
        break;
    case "C33":
    case "C34":
        $k="C349";
        break;
    case "C41":
    case"C40":
        $k="C419";
        break;
    case "C65" :
    case "C66" :
    case"C67" :
    case"C68":
        $k="C689";
        break;
  }
    $ligne1=$resultat1->fetch();
    };
   return $k; 
}
function recupgroupemorpho($patient){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct groupe_morpho_iacr from table_union where newid="'.$patient.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    while ($ligne1){
        $groupemorpho=$ligne1[0];
        groupemorpho($patient,$groupemorpho);
        //on a recupéré tous le codes 
        // traitement pour chaque code
        $ligne1 = $resultat1->fetch();
    };
    $resultat1->closeCursor();
}
function groupemorpho($patient,$groupemorpho){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*)from table_union where newid="'.$patient.'" and groupe_morpho_iacr="'.$groupemorpho.'"and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if ($ligne1[0]>1) {
        recuptopo1($patient,$groupemorpho);
    }
    else{
        $requete2='insert into test4 select * from table_union where newid="'.$patient.'" and groupe_morpho_iacr="'.$groupemorpho.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
        $resultat2=$bdd->query($requete2);
    }
    $resultat1->closeCursor();
}
function recuptopo1($patient,$groupemorpho){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct codtopocimo3 from table_union where newid="'.$patient.'" and groupe_morpho_iacr="'.$groupemorpho.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    while ($ligne1){
        $codetopo=$ligne1[0];
        testtopo($patient,$groupemorpho,$codetopo);
        //on a recupéré tous le codes 
        // traitement pour chaque code
        $ligne1 = $resultat1->fetch();
    };
    $resultat1->closeCursor();
}
function testtopo($patient,$groupemorpho,$codetopo){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*) from table_union where newid="'.$patient.'"and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr="'.$groupemorpho.'" and GROUPE_MORPHO_IACR not BETWEEN 8 and 14 group by newid,codtopocimo3,groupe_morpho_iacr;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if($ligne1[0]>1){
        //meme topo
        //1seul cancer avec le cimo3morpho le plus elevé
        $requete2='insert into test5 SELECT distinct* FROM table_union where GROUPE_MORPHO_IACR not BETWEEN 8 and 14 and newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr="'.$groupemorpho.'" group by newid,CODTOPOCIMO3,GROUPE_morpho_IACR having codmorphocimo3=max(codmorphocimo3);';
        $resultat2=$bdd->query($requete2);
    }
    else{
        $requete2='insert into test6 SELECT * FROM table_union where GROUPE_MORPHO_IACR not BETWEEN 8 and 14 and newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr="'.$groupemorpho.'" group by newid,CODTOPOCIMO3,GROUPE_morpho_IACR;';
        $resultat2=$bdd->query($requete2);
    }
    $resultat1->closeCursor();
}
?>
