<?php

class Iterator1
{
    public string $id;
    public function __construct(public float $amount)
    {
        $this->id = random_int(1000, 99999);
    }
}
// 
// class InvoiceCollection implements \Iterator
// {
    // private int $position = 0; // Position for iteration
    // private array $invoices;
// 
    // public function __construct(array $invoices)
    // {
        // $this->invoices = $invoices;
    // }
// 
    // public function current(): mixed
    // {
        // echo __METHOD__ . PHP_EOL;
        // return $this->invoices[$this->position];
    // }
// 
    // public function next(): void
    // {
        // echo __METHOD__ . PHP_EOL;

        // ++$this->position;
    // }
// 
    // public function key(): mixed
    // {
        // echo __METHOD__ . PHP_EOL;
// 
        // return $this->position;
    // }
// 
    // public function valid(): bool
    // {
        // echo __METHOD__ . PHP_EOL;

        // return isset($this->invoices[$this->position]);
    // }
// 
    // public function rewind(): void
    // {
        // echo __METHOD__ . PHP_EOL;

        // $this->position = 0;
    // }
// }
// 
// use Exception;
// use Traversable;
class Collections implements \IteratorAggregate
{
   public function __construct(private array $items)
   {
        
   }
   public function getIterator(): \Iterator
   {
       // foreach ($this->invoices as $invoice) {
           // yield $invoice;
       // }
       return new ArrayIterator($this->items);
   }

}
class InvoiceCollection extends Collections
{
    // private int $position;
}

$invoiceCollection = new InvoiceCollection([
    new Iterator1(25),
    new Iterator1(50),
    new Iterator1(75),
]);

foreach ($invoiceCollection as $key => $invoice) {
    echo $key . ' => ' . $invoice->amount . PHP_EOL;
}
