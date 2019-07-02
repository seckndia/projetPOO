<?php
class Batiment{
    private $num_bat;
    public function __construct($num_bat="")
    {
     $this->num_bat=$num_bat;   
    }
    public function setNum_bat($num_bat)
    {
        $this->num_bat = $num_bat;

    }
    public function getNum_bat()
    {
        return $this->num_bat;
    }
    

   
}
?>