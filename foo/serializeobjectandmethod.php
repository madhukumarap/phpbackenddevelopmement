<?php
//serialize of objectand method

echo serialize(true) . PHP_EOL;
echo serialize(1).PHP_EOL;
echo serialize(2.4).PHP_EOL;  
echo serialize("madhu").PHP_EOL;  
echo serialize([1,2,3,4]).PHP_EOL;  
echo serialize(['a'=>'1','b'=>'2']).PHP_EOL;
var_dump( unserialize(serialize(['a'=>'1','b'=>'2'])));  

class In{

}

$in = new In();
// var_dump( unserialize(serialize($in)));  
$new1 = unserialize('object(In)#2 (0) {}');
var_dump($new1);