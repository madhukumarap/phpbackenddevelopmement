<?php 
// They allow for better organization by grouping classes that work together to perform a task
// They allow the same name to be used for more than one class
require_once('Transaction.php');
// var_dump(new madhu\Transaction()); or another type is there 

use madhu\Transaction;
var_dump(new Transaction());