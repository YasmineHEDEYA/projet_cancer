<?php

set_time_limit(50000);

try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
};
//finalisation remplissage
    // $req='insert into cancer select distinct * from test1;
    //  insert into cancer select distinct * from test2;
    //  insert into cancer select distinct * from test3;
    //  insert into cancer select distinct * from test4;
    //  insert into cancer select distinct * from test5;
    //  insert into cancer select distinct * from test6;';
    // $req2='insert into test7 select distinct * from cancer;
    //  truncate cancer;
    //  insert into cancer select * from test7;
    //  truncate test7';
    //  $res=$bdd->query($req);
    //  $res2=$bdd->query($req2);
// parcours des patients
     $requete = 'SELECT distinct newid FROM `cancer` order by newid;';
     $resultat = $bdd->query($requete);
     $ligne = $resultat->fetch();
     while ($ligne){
         $patient= $ligne['newid'];
         //traitement pour chaque patient
            recuptopo($patient);
            $ligne = $resultat->fetch();
     };
     $resultat->closeCursor();

function recuptopo($patient){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct codtopocimo3 from cancer where newid="'.$patient.'"and codtopocimo3!="NA";';
    $resultat1 = $bdd->query($requete1);
    $ligne1 = $resultat1->fetch();
    while ($ligne1){
        $codetopo= $ligne1[0];
        //on a recupéré tous le codes 
        // traitement pour chaque code
        topo($patient,$codetopo);
        $ligne1 = $resultat1->fetch();
    };
    $resultat1->closeCursor();
}
function topo($patient,$codetopo){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select count(*)from cancer where newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" ;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    if ($ligne1[0]>1) {
        //meme topo
        recupgroupemorpho($patient,$codetopo); 
    }
    $resultat1->closeCursor();
}
function recupgroupemorpho($patient,$codetopo){
    try {$bdd = new PDO('mysql:host=localhost;dbname=cancer_final', 'root', '',  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE =>         PDO::ERRMODE_EXCEPTION));
                  
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    };
    $requete1='select distinct groupe_morpho_iacr from cancer where newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" ;';
    $resultat1=$bdd->query($requete1);
    $ligne1=$resultat1->fetch();
    while ($ligne1){
        $groupemorpho=$ligne1[0];
        if($groupemorpho !=5 && $groupemorpho!=14 && $groupemorpho!=17){
                $requete2='delete from cancer where newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr in (5, 14, 17);';
                $resultat2=$bdd->query($requete2);
        }
        else if ($groupemorpho!=14 && $groupemorpho!=17){
            $requete2='delete from cancer where newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr in (14, 17);';
            $resultat2=$bdd->query($requete2);
        }
        else{
            $requete2='delete from cancer where newid="'.$patient.'" and codtopocimo3="'.$codetopo.'" and groupe_morpho_iacr=17;';
            $resultat2=$bdd->query($requete2);
        }
        $ligne1=$resultat1->fetch();
    }
    $resultat1->closeCursor();
}
?>