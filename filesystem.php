<?php 
//working with file systhem
$dir  = scandir(__DIR__);
var_dump($dir);
//create directort mkdir() first argy is dir name second is permission
// mkdir('foo',);  //mkdir('foo/bar)
//rmdir() to delete the dir
// rmdir('foo');

if(file_exists('foo.txt') && file_exists('foo')){
    echo filesize('foo.txt');
} else{
    mkdir('foo',);
    echo 'file not found';
}