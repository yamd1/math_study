<?php

// use App\UseCase\SingleNum;

// require_once "vendor/autoload.php";

function hoge(string $val, int $numval, array $arr)
{
    $arr[] = "in function";
}
$val = "valval";
$numval = 123;
$arr = ["1", "2"];

hoge($val, $numval, $arr);

var_dump($arr);


/* $s_time = microtime(true); */
/* $n = 100000; */
/* $a = array_fill(0, $n, 0); */
/* $e_time = microtime(true); */

/* $t = $e_time - $s_time; */

/* var_dump($a); */
/* echo $t . "秒"; */
