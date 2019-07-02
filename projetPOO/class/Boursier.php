<?php
class Boursier extends Etudiant{
  
    public $id_type;
   
    public function __construct($matricule="",$nom="",$prenom="",$email="",$tel="",$date_naiss="", $id_type)
    {
        //appel du constructeur de la classe parent qui est Etudiant
        parent::__construct($matricule,$nom,$prenom, $email,$tel,$date_naiss);
    
       //$this->libelle=$libelle->getLibelle();
       $this->id_type=$id_type;
       
    
    }
   

   
    

    
    public function getId_type()
    {
        return $this->id_type;
    }

    
    public function setId_type($id_type)
    {
        $this->id_type = $id_type;

        
    }
}


?>