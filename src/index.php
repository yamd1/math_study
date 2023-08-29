<?php

use App\UseCase\SingleNum;

require_once "vendor/autoload.php";

echo "hello\n";
echo "uuu\n";
echo "world\n";

$instance = new SingleNum;
$instance->run([1,2,2]);

/* $s_time = microtime(true); */
/* $n = 100000; */
/* $a = array_fill(0, $n, 0); */
/* $e_time = microtime(true); */

/* $t = $e_time - $s_time; */

/* var_dump($a); */
/* echo $t . "秒"; */
