<?php
include_once('Database.php');
 class Service_Etudiant{
    
 public function parcourir(){
            //On admet que $db est un objet PDO
       //$perso=new Type();
//  $database=new Database();
//  $connection=$database->connect();
//  $request = $connection->query('SELECT * FROM TYPE_bourse');
//  var_dump($request);
//  //die();
//  while ($perso = $request->fetch(PDO::FETCH_ASSOC))  //Chaque entrée sera récupérée et placée dans un array.
//  {
//    var_dump($perso);
//  echo $perso['id_type'].'<br>';
//   echo $perso['libelle'].'<br>';
//   echo $perso['montant'].'<br>';

//  }
 }

//Requete permettant d'ajouter des etudiants:

public function addEtudiant(Etudiant $etudiant){
  
  try{
    //pour etudiant
  $dpo=Database::connect();
$req=$dpo->prepare('INSERT INTO ETUDIANT(matricule,nom,prenom,email,tel,date_naiss) VALUES(:matricule,:nom,:prenom,:email,:tel,:date_naiss)');
$req->bindValue(':matricule',$etudiant->getMatricule(),PDO::PARAM_STR);
$req->bindValue(':nom',$etudiant->getNom(),PDO::PARAM_STR);
$req->bindValue(':prenom',$etudiant->getPrenom(),PDO::PARAM_STR);
$req->bindValue(':email',$etudiant->getEmail(),PDO::PARAM_STR);
$req->bindValue(':tel',$etudiant->getTel(),PDO::PARAM_INT);
$req->bindValue(':date_naiss',$etudiant->getDate_naiss());

$insert=$req->execute();
//********************************************************************* */
//code pour l'insertion pour les etudiants non boursier.


 //Recherche du dernier matriculle
  $request = $dpo->query('SELECT MAX(id_etu) as mat FROM ETUDIANT');
  while ($perso = $request->fetch()) {
    $id=$perso['mat'];
    break;
  }
  
   if(get_class($etudiant)=="Non_boursier"){
    //$addresse=$etudiant->getAddresse;
     //on insere les non_boursier
     $req=$dpo->prepare('INSERT INTO NON_BOURSIER(id_etu,adresse) VALUES(:id_etu,:adresse)');
     $req->bindValue(':id_etu',$id,PDO::PARAM_INT);
$req->bindValue(':adresse',$etudiant->getAddresse(),PDO::PARAM_STR);
$insert=$req->execute();

   }
//************************************************************************** */
   //code pour l'insertion pour les etudiants boursier.

//recherche du dernier id de la classe etudiant
$request = $dpo->query('SELECT MAX(id_etu) as mat FROM ETUDIANT');
while ($perso = $request->fetch()) {
  $id=$perso['mat'];
  break;
}

if(get_class($etudiant)=="Boursier"){
  $req=$dpo->prepare('INSERT INTO BOURSIER(id_etu,id_type) VALUES(:id_etu,:id_type)');
  $req->bindValue(':id_etu',$id,PDO::PARAM_INT);
$req->bindValue(':id_type',$etudiant->getId_type(),PDO::PARAM_INT);
$insert=$req->execute();
}
//******************************************************************** */
//cas de loger

if(get_class($etudiant)=="Loger" ||get_class($etudiant)=="Boursier" ){
  $req=$dpo->prepare('INSERT INTO LOGER(id_etu,id_chambre) VALUES(:id_etu,:id_chambre)');
  $req->bindValue(':id_etu',$id,PDO::PARAM_INT);
$req->bindValue(':id_chambre',$etudiant->getNum_chamb(),PDO::PARAM_INT);
$insert=$req->execute();
var_dump($insert);
$req=$dpo->prepare('INSERT INTO BOURSIER(id_etu,id_type) VALUES(:id_etu,:id_type)');
  $req->bindValue(':id_etu',$id,PDO::PARAM_INT);
$req->bindValue(':id_type',$etudiant->getId_type(),PDO::PARAM_INT);
$insert=$req->execute();
}


 }
catch(PDOException $e){
  echo $e->getMessage();
}
}
//*************************************** */
//on est au niveau de la methode find
public function findEtudiant($para){
try {
  $dpo=Database::connect();

  $request = $dpo->query("SELECT * FROM ETUDIANT WHERE matricule='$para'or nom='$para' ");
$req=$request->fetchAll(PDO::FETCH_OBJ);
//var_dump($rep);
 return $req;
  //var_dump($req);
 





} catch (PDOException $e) {

  echo $e->getMessage();

}



}
public function findNonBoursier($para){
  try {
    $connexion=Database::connect();
    
  $request = $connexion->query("SELECT ETUDIANT.matricule as matricule, ETUDIANT.nom as nom ,ETUDIANT.prenom as prenom, ETUDIANT.email as email, ETUDIANT.tel as tel, ETUDIANT.date_naiss as date_naiss,NON_BOURSIER.adresse as adresse 
  FROM ETUDIANT,NON_BOURSIER 
  WHERE  ETUDIANT.id_etu=NON_BOURSIER.id_etu AND matricule='$para'or nom='$para' ");
  $req=$request->fetchAll(PDO::FETCH_OBJ);

  return $req;






  } catch (PDOException $e) {
    echo $e->getMessage();

  }
}
public function findBoursier($para){
  try {
    $connexion=Database::connect();
    
  $request = $connexion->query("SELECT ETUDIANT.matricule as matricule, ETUDIANT.nom as nom ,ETUDIANT.prenom as prenom, ETUDIANT.email as email, ETUDIANT.tel as tel, ETUDIANT.date_naiss as date_naiss,TYPE_bourse.libelle as libelle,TYPE_bourse.montant as montant
  FROM ETUDIANT,TYPE_bourse,BOURSIER 
  WHERE  ETUDIANT.id_etu=BOURSIER.id_etu AND  BOURSIER.id_type=TYPE_bourse.id_type AND matricule='$para' ");
  $req=$request->fetchAll(PDO::FETCH_OBJ);
var_dump($req);
  return $req;






  } catch (PDOException $e) {
    echo $e->getMessage();

  }
}

 }




?>
