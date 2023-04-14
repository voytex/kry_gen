<?php
//zadani: a ≡ b mod c

$random = rand(1,2); //slouzi k vyberu kongruentni / NEkongruentni
//podle vyberu se nastavi operand $congruent na True / False

if ($random == 1) {

//kongruentni
$C = rand(3, 60); //C

$X = rand(7, 25);
$Y = rand(25, 50);
$Z = rand(3, 23);

$A = ($C * $X) + $Z; //A
$B = ($C * $Y) + $Z; //B

$congruent = True;

} else {

//NEkongruentni
$C = rand(3, 60); //C
$X = rand(7, 25);
$Y = rand(25, 50);

$Z = rand(3, 23);

$A = ($C * $X) + $Z; //A
$B = ($C * $Y); //B

$congruent = False;
}

?>