<?php
//probelm and its solve
//  latestatic function used runtime info detaermine how call method 

require_once __DIR__ . '/../projectwithdocker/src/vendor/autoload.php';



$classA = new \src\Classa();
$classB = new \src\Classb();

echo $classA->getName() . PHP_EOL;