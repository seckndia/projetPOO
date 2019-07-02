<?php
$serveur="localhost";
$login="root";
$pass="cheikh1002";
try{


   $connexion=new PDO("mysql:host=$serveur;dbname=PROJET_UNIVERSITE" ,$login, $pass);
    $connexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $insertion="INSERT INTO  `ETUDIANT`( `id_etu`, `matricule`, `nom`, `prenom`,  `email`,  `tel`,  `date_naiss`)
    VALUES(NULL,'DJ1036','diallo','mohamed','diallo@gmail.com',778963612,'1996-02-06');";
     $connexion->exec($insertion);

        // $req1=$connexion->prepare("INSERT INTO ETUDIANT (matricule, nom, prenom, email, tel, date_naiss) VALUES(?,?,?,?,?,?,?)");
        // $req1=exec(array('0055efh','fall','amy','fall@gmail.com',85785584,'1990-02-05'));
        echo "valeurs bien inserées";
}

catch( PDOException $e){
    echo'echec: '.$e->getMessage();
}



?>