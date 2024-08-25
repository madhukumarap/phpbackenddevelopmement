<?php 
// generator

class GeneratorExample {
    public function __construct() {
        // Constructor
    }

    public function index() {
        $numbers = $this->lazyRange(1, 10);
        // echo $numbers->current();
        // $numbers->next();
        // echo $numbers->current();
        foreach($numbers as $key =>$number){
            echo "'$key' : '$number'";
        }

    }
    private function lazyRange(int $start, int $end): Generator   
    {
        for($i = $start; $i <= $end; $i++){
            yield $i * 5 =>$i;
        }
    }   
}

$generator = new GeneratorExample();
$generator->index(); // Corrected variable name
