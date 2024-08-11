<?php 
// $str = '{"a":1,"b":2}';
// $json = json_decode($str);
// var_dump($json->a);  //-> this arrow(->) is object operetor to accss

$obj = new \stdClass();

$obj->a = 1;
$obj->b = 2;
var_dump($obj);  //this will be casting 

//another type
$arr1 = [1,2,3];
$obj1 = (object) $arr1;
var_dump($obj1);

var_dump((object)1);

