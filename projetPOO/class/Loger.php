<?php

class Loger extends Boursier{
    private $num_chamb;
   
public function __construct($matricule="",$nom="",$prenom="",$email="",$tel="",$date_naiss="", $id_type="", $num_chamb)
{//appel du constructeur de la classe parent qui est Etudiant
    parent::__construct($matricule,$nom,$prenom, $email,$tel,$date_naiss, $id_type);
   $this->num_chamb=$num_chamb; 
}

public function setNum_chamb($num_chamb)
    {
        $this->num_chamb = $num_chamb;
    }
   
    public function getNum_chamb()
    {
        return $this->num_chamb;
    }

    
    
}
?>