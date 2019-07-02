<?php
class Non_boursier extends Etudiant{
    private $addresse;
    public function __construct($matricule="",$nom="",$prenom="",$email="",$tel="",$date_naiss="",$addresse="")
    {
        //appel du constructeur de la classe parent qui est Etudiant
        parent::__construct($matricule,$nom,$prenom, $email,$tel,$date_naiss);
        $this->addresse=$addresse;  
    }
    public function setAddresse($addresse)
    {
        $this->addresse = $addresse;
    }

    public function getAddresse()
    {
        return $this->addresse;
    }

   public function info(){
       return parent::$this->info.", ".$this->addresse;
   }
   






}




?>