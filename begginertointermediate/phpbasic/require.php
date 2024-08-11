<?php 
//include and require
//diffrence b/w include and require 
//include will result to while warning 
//require will result to error while stop the excution
include 'file.php'; // include 'filepath';
echo 'hello'; // when file not found this will give warning and excute the output
// include_once  this also same as require but if we render 2 time it work only one time 
//require method
require 'textfile.php';
require 'textfile.php';

echo 'hello require'; //when file path not found in require method it give error and stop excution at same line