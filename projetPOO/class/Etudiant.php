<?php
abstract class Etudiant{
private $nom;
private $prenom;
private $matricule;
private $tel;
private $email;
private $date_naiss;
 

public function __construct($matricule="",$nom="",$prenom="",$email="",$tel="",$date_naiss="")
   {
     $this->matricule=$matricule;
     $this->nom=$nom;
     $this->prenom=$prenom;
     $this->email=$email;
     $this->tel=$tel;
     $this->date_naiss=$date_naiss;
    }
     
public function setMatricule($matricule)
     {
      $this->matricule = $matricule;

    }
    
public function getMatricule()
   {
    return $this->matricule;
     }
     
public function setNom($nom)
    {
    $this->nom = $nom;

    }
    
     public function getNom()
     {
          return $this->nom;
     }
     

     public function setPrenom($prenom)
     {
          $this->prenom = $prenom;

     }
    
     public function getPrenom()
     {
          return $this->prenom;
     }
     
     public function setEmail($email)
     {
          $this->email = $email;
   
     }
     

     public function getEmail()
     {
          return $this->email;
     }
     

     public function setTel($tel)
     {
          $this->tel = $tel;
     }
     
     public function getTel()
     {
          return $this->tel;
     }
     
     public function setDate_naiss($date_naiss)
        {
          $this->date_naiss = $date_naiss;

         }

     public function getDate_naiss()
     {
          return $this->date_naiss;
     }

    public function Info(){
        return $this->matricule. ",".$this->nom. ",".$this->prenom.",".$this->email.",".$this->tel. ",".$this->date_naiss ;;
    }
}
?>