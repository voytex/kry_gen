<?php

//zadani: algoritmus RSA
//1 - uzivatel zna m,p,q,e - snazi se zjistit c
//2 - uzivatel zna c,p,q,d - snazi se zjistit m

//funguje to jen pro relativne mala cisla, jakmile jsou zprava nebo klice moc velke, zacina se to jebat

$m = intval(gmp_nextprime(rand(4, 30))); //zprava m

for ($k=1; $k=1000; $k++) {

$p = intval(gmp_nextprime(rand(2, 50))); //stanoveni zakladnich hodnot p,q,n,phi
$q = intval(gmp_nextprime(rand(2, 50)));
$n = $p * $q;
$phi = ($p - 1)*($q - 1);

$e = intval(rand(2, $phi)); //verejny klic e
$d = intval(gmp_invert($e, $phi)); //soukromy klic d

$c = intval(pow($m, $e) % $n); //kryptogram c
$m1 = intval(pow($c, $d) % $n); //decrypt zpatky na m ($m1 slozi jako kontrola)

if ($e < $phi and $e != $d and $e % $phi != 0 and $c > 1 and $m == $m1 and $m != $c and $n % $e != 0){
    return[$m, $p, $q, $e, $d, $c];
}

}

?>