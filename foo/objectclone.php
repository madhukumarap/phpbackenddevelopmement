<?php 

//crate one class
class Transaction
{
    /**
     * Summary of process
     * @param string $customer
     * @param float $amount
     * @return bool
     */
    public function process($customer,$amount): bool
    {
        return true;
    }
}

//clone the object
$transaction = new Transaction(24,'hello');
$transaction2 = clone $transaction;
var_dump($transaction2);