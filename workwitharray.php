<?php 
// https://www.php.net/manual/en/ref.array.php  ->check the link
//array chunks 
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
$chunks = array_chunk($items, 2);
print_r($chunks);
//array combine
echo "<br/>";
$keys = ['a', 'b', 'c', 'd']; //if size is did't match is thorugh the error
$values = [1, 2, 3, 4];
$combined = array_combine($keys, $values);
print_r($combined);

//array filter iterator over each value
echo "<br/>";
$item = [1,2,3,4,5,6,7,8,9,0];
$even = array_filter($item, fn($num) => $num %2 ===0); //this will accept array and call back function
//to correct index value
// $even = array_values($even);
print_r($even);

//array_map
echo "<br/>";
$items = [1,2,3,4,5,6,7,8,9,0];
$square = array_map(fn($num) => $num * $num, $items);
print_r($square);

//merge array
echo "<br/>";
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
$items2 = ['e' =>5, 'f' =>6, 'g' => 7, 'h' =>8, ];
$merge = array_merge($items, $items2);
print_r($merge);
//array reduce
echo "<br/>";
$items = [1,2,3,4,5,6,7,8,9,0];
$sum = array_reduce($items, fn($carry, $item) => $carry + $item, 0);
echo $sum;

//example 2
$invoiceitems = [
    ['price' => 9.99, 'qty' => 3, 'desc' => 'Item 1'],
    ['price' => 19.99, 'qty' => 2, 'desc' => 'Item 2'],
    ['price' => 4.99, 'qty' => 5, 'desc' => 'Item 3'],
    ['price' => 1.99, 'qty' => 1, 'desc' => 'Item 4'],
];
$total = array_reduce($invoiceitems,fn($sum, $item) => $sum + $item['qty']* $item['price']);
print_r($total);

//array search
echo "<br/>";
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
$search = array_search(3, $items); //it willl retunr key 0r index place vlaue it will give first match value
echo $search; 
if (in_array('1',$items)){
    echo "found";
}

// array_diff and array_diff_assoc
//array_diff compare only the values not key
// array_diff_assoc is compare both key and values
echo "<br/>";
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
$items2 = ['e' =>5, 'f' =>6, 'g' => 7, 'h' =>8, ];
$diff = array_diff($items, $items2); //it compare 2 array array1 compare with array2 so if not found any except array1 it return te array one
print_r($diff);
echo "<br/>";
// we also use array_diff_key()

$diff2 = array_diff_assoc($items, $items2);
print_r($diff2);


//asort
echo "<br/>";
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
asort($items); //it will sort the array based on values
print_r($items);
echo "<br/>";
//ksort
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
ksort($items); //it will sort the array based on keys
print_r($items);

//custom function to sort array
echo "<br/>";
$items = ['a' =>1, 'b' =>2, 'c' => 3, 'd' =>4, ];
uasort($items, fn($a, $b) => $a <=> $b); //it will sort the array based on values for reverse order we use only $b<=>$a
print_r($items);
echo "<br/>";


//array destrucring
$items = [1, 2,  3, 4, ];
[$a, $b, $c, $d] = $items;
echo $a . ','.$b. ','.$c. ','.$d. '<br/>';
