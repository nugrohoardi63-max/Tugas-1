<?php

require_once "animal.php";
require_once "Ape.php";
require_once "Frog.php";

// ===== Release 0 - Animal =====
echo "=== Release 0: Animal ===\n";
$sheep = new Animal("shaun");
echo $sheep->name . "\n";       // "shaun"
echo $sheep->legs . "\n";       // 4
echo $sheep->cold_blooded . "\n"; // "no"

// ===== Release 1 - Inheritance =====
echo "\n=== Release 1: Inheritance ===\n";
$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "\n";
echo "Legs : " . $sungokong->legs . "\n";
$sungokong->yell();             // "Auooo"
echo "\n";

$kodok = new Frog("buduk");
echo "Name : " . $kodok->name . "\n";
echo "Legs : " . $kodok->legs . "\n";
$kodok->jump();                 // "hop hop"
echo "\n";
