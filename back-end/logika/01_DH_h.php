<?php

//zadani: vypocet klice DH protokolu pri zadanych hodnotach p, g, a, b
//nevim jak overit, ze g je opravdu generatorem Zp*, tudiz jsem to zacyklil s mrdou podminek, aby to proste fungovalo

for ($i=1; $i=10000; $i++) {

$p = intval(gmp_nextprime(rand(10, 96))); //random zvolene p, g
$g = intval(rand(2, $p - 1));

$a = intval(rand(2, $p - 1)); //na random zvolene a, b
$b = intval(rand(2, $p - 1));

$A = intval(pow($g, $a) % $p); //vypocet A, B
$B = intval(pow($g, $b) % $p);

$KA = intval(pow($B, $a) % $p); //vypocet klice
$KB = intval(pow($A, $b) % $p);

if ($A > 1 and $a != $b and $KA > 1 and $KA != $A and $KA == $KB) {
    break;
}

}

?>