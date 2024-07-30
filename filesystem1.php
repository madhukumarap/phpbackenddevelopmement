<?php 
$file = fopen('foo.txt','r');
// while(($line = fgets($file) )!= false){
//     echo $line .'<br/>';
// }
//we also read fgetcsv
// while(($line = fgetcsv($file) )!= false){
//     print_r( $line );
// }
// fclose($file);

$content = file_get_contents('foo.txt',offset:3,length:2);
echo $content;

//write the file
// file_put_contents('foo1.txt','hello madhu');
// file_put_contents('foo1.txt','hello madhu',FILE_APPEND);
//to unlink
// unlink('foo1.txt');
//to m ake copy
copy('foo.txt','foo1.txt');
// to rename
rename('foo.txt','foo1.txt');
