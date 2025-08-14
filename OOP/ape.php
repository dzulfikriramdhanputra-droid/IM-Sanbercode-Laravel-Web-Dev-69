<?php
require_once("Animal");

class Ape extends Animal
{
    public $legs = 2;
    
    public function yell()
    {
        return "Yell : $this->namaHewan Auooo <br>";
    }

}


?>