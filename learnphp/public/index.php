<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */
require APP_PATH . 'App.php';
require APP_PATH . 'helper.php';
$files = getTransactionFiles(FILES_PATH);

//looping the transactio file
$transaction = [];
foreach($files as $file){
    $transaction = array_merge($transaction, getTransaction($file,'extractTransaction'));
}
$totals = calculateTotal($transaction);
// var_dump($file);
// print_r($transaction);
require VIEWS_PATH . 'transactions.php';
