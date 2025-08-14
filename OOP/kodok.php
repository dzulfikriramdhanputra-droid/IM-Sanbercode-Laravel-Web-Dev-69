<?php
require_once("Animal");

class kodok extends Animal
{
    public function jump()
    {
        return "Jump : $this->namaHewan Hop Hop <br>";
    }

}


?>