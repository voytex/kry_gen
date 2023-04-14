<?php
//zadani: Greatest Common Divisor dvou cisel

for ($i = 1; $i<12; $i++){ //opakovane generovani cisel (bez nej bude vetsinou $C = 1)

$A = rand(299, 1501); //random generovana cisla
$B = rand(299, 1501);

$C = gmp_gcd($A,$B); //vysledek

if ($C != 1 and $C != 2 and $C != 3) { //smycka se prerusi kdyz $C != 1/2/3
break;
} 

}

?>