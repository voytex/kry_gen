<?php
//zadani: Test prvociselnosti

$random = rand(1,2); //slouzi k vyberu prvocislo / slozene cislo
//podle vyberu se operand $prime nastavi na True/False

if ($random == 1) {

//prvocislo
$X = rand(530, 10000);
$C = gmp_nextprime($X); //vysledek

$prime= True;

} else {

//slozene cislo


for ($k = 1; $k = 1000; $k++){ //cyklus overujici, ze se jedna o slozene cislo ktere zaroven neni delitelne cisly 2 a 5 (at to neni obvious)

$X = rand(1, 10000);

    for ($i = 2; $i <= $X/2; $i++){ 
    
        if ($X % $i == 0 and $X % 2 != 0 and $X % 5 != 0) { 
        //tady uz se mi zacyklil i mozek
        break;
        }
    }

    if ($X % $i == 0 and $X % 2 != 0 and $X % 5 != 0) {

        $C = $X; //vysledek
        break;
        }

}
  
$prime = False;

}

?>