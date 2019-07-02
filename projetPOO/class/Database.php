<?php
class Database
  {
   
private static $dbhost="localhost";
private static $dbname="PROJET_UNIVERSITE";
private static $dbuser="root";
private static $dbpw="cheikh1002";

private static $connexion=null;

public static function connect(){
    try{
   self:: $connexion= new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname,self::$dbuser,self::$dbpw);
  self::$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //    $insertion="INSERT INTO  `ETUDIANT`( `id_etu`, `matricule`, `nom`, `prenom`,  `email`,  `tel`,  `date_naiss`)
    //     VALUES(NULL,'SA1037','sall','awa','diallo@gmail.com',778963612,'1996-02-06');";
    //       self::$connexion->exec($insertion);
    
            // $req1=$connexion->prepare("INSERT INTO ETUDIANT (matricule, nom, prenom, email, tel, date_naiss) VALUES(?,?,?,?,?,?,?)");
            // $req1=exec(array('0055efh','fall','amy','fall@gmail.com',85785584,'1990-02-05'));
                   
    }

    catch(PDOException $e){
        die($e->getMessage());
    }
    return self::$connexion; 
}
public static function disconnect(){
    self::$connexion=null;
}

}
?>