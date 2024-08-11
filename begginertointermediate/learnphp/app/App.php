<?php

declare(strict_types = 1);

// Your Code
function getTransactionFiles(string $dirPath): array {
    $files = [];
    foreach(scandir($dirPath) as $file) {
        if (is_dir($dirPath . DIRECTORY_SEPARATOR . $file)) {
            continue;
        }
        $files[] = $dirPath . DIRECTORY_SEPARATOR . $file;
    }
    return $files;
}
function getTransaction(string $fileName, ?callable $transactionHandler = null): array {
    if (!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist', E_USER_ERROR);
    }
    $file = fopen($fileName, 'r');
    fgetcsv($file); // Skip the header row
    $transactions = [];
    while (($line = fgetcsv($file)) !== false) {
        if($transactionHandler !== null){
            $line[] = $transactionHandler($line);
        }
        $transactions[] = extractTransaction($line);
    }
    fclose($file);
    return $transactions;
}
function extractTransaction(array $transactionRow):array {
    $date = $transactionRow[0];
    $checkNumber = $transactionRow[1];
    $description = $transactionRow[2];
    $amount = $transactionRow[3];
    // or
    // [$date,$checknumber,$description,$amount] =$transactionRow
   $amount = (float)str_replace(['$', ','],'', $amount);
    return [
        'date' => $date,
        'checkNumber'=> $checkNumber,
        'description' => $description,
        'amount' => $amount,

    ];
}

function calculateTotal(array $transactions):array {
    $totals = ['netTotal' =>0, 'totalIncome' =>0, 'totalExpense'=>0];
    foreach($transactions as $transaction){
        $totals['netTotal'] += $transaction['amount'];
        if($transaction['amount'] >= 0){
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }
    return $totals;
}