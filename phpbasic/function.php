<?php 
// variable, anonymous & arrow function
// function add(int |float ...$numbers) : int | float {
//         return array_sum($numbers);
// }
// echo add(1,2,3,4);

function add(int |float ...$numbers) : int | float { 
        return array_sum($numbers);
}
$x1 = 'add';
// echo $x(1,2,3,4); //in this type of case when php detect parentheses next to a variables it will look for function in same name whatever variable evalute to in this case x evalute sum so he call function if does not exits else it thorugh error to avoid that type of error we use like this
 if(is_callable($x1)){
    echo $x1(1,2,3,4); 
 } else {
    echo 'not callable';
 }

//anonumous function also know as lambda fucntion we save no name, anonumouse function ending with semicoloan
// function is local scope we can acces the out of variabls
$sum = function(int | float ...$num): int | float{
    return array_sum($num);
};
echo $sum(1,2,3); 
// in anonymous function we acces the variables 
$name = "madhu"; // this var with global scope
$sum1 = function(int | float ...$num)use($name) : int | float{ // use($name if we pass amparsend like this &$name gloabl var value is alos chnage)
    $name = "hello madhu"; // we can change in local scope var 
    echo $name; 
    return array_sum($num);
};
echo $sum1(1,2,3);
echo $name;

// working array
$array = [1,2,3,4];
$array2 = array_map(function($arr){
    return $arr * 2;
},$array);
print_r($array);
print_r($array2);

// arrow function help in inline function
$y = 5;
$array3 = array_map(fn($num)  =>$num * $num  * ++$y, $array); // arrow function is single expression
print_r( $array3);
