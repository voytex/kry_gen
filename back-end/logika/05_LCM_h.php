<?php
//zadani: Largest Common Multiple dvou cisel

$A = rand(120, 920); //randon generovani cisel
$B = rand(120, 920);

$C = gmp_lcm($A,$B); //vysledek

?>