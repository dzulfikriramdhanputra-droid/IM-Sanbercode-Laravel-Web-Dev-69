<?php
require_once("Animal.php");
require_once("kodok.php");

$sheep = new Animal("shaun");

echo " Name : " . $shaun->name . "<br>"; // "shaun"
echo " legs : " . $shaun->legs . "<br>"; // 4
echo "cold_blooded : " . $shaun->cold_blooded . "<br> <br>"; // "no"

$kodok = new Frog("buduk");

echo " Name : " . $kodok->name . "<br>"; // "buduk"
echo " legs : " . $kodok->legs . "<br>"; // 4
echo "cold_blooded : " . $kodok->cold_blooded . "<br>"; // "no"
echo $kodok->jump(); // "hop hop"

$sungokong = new Ape("kera sakti");
echo " Name : " . $sungokong->name . "<br>"; // "kera sakti"
echo " legs : " . $sungokong->legs . "<br>"; // 2
echo "cold_blooded : " . $sungokong->cold_blooded . "<br>"; // "no"
echo $sungokong->yell(); // "Auooo"


?>