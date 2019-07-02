<?php
class Chambre{
    private $num_bat;
    public function __construct(Batiment $num_bat)
    {
       $this->num_bat=$num_bat->getNum_bat(); 
    }
    
    public function setNum_bat($num_bat)
    {
        $this->num_bat = $num_bat->getNum_bat();
    }
    public function getNum_bat()
    {
        return $this->num_bat->getNum_bat();
    }

    
    
}


?>