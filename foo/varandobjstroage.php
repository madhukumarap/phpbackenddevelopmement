<?php 

class Invoice 
{
    public function __construct(public float $amount, public string $description )
    {

    }
}

$invoice1 = new Invoice(25, 'My Invoice ');
$invoice2 = new Invoice(25, 'My Invoice ');

$invoice3 = $invoice1;
echo 'invoice1 == invoice2' . PHP_EOL; // loose comparison 
var_dump($invoice1 == $invoice3);
echo 'invoice1 === invoice2' . PHP_EOL; // tight comparison
var_dump($invoice1 === $invoice3);