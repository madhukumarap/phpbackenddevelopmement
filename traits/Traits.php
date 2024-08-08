<?php 
trait LatteTraits
{
    public function makeLatte()
    {
        echo static::class . 'is making the latte' . PHP_EOL;
    }   
}

trait CappuccinoTraits
{
    public function makeCappuccino()
    {
        echo static::class . 'is making the Cappuccino' . PHP_EOL;
    }
} 
trait CoffeeTraits {
    public function makeCoffee()
    {
        echo static::class . 'is making the coffee' . PHP_EOL;
    }
}

class  CoffeeMaker{
     use CoffeeTraits;
}

class LatteMaker extends CoffeeMaker{
    use LatteTraits;
}
class CappuccinoMakker extends CoffeeMaker{
   use CappuccinoTraits;
}
class AllInOneCoffeeMaker extends CoffeeMaker 
{
    use CoffeeTraits, LatteTraits, CappuccinoTraits;
}


$coffeemakker = new CoffeeMaker();
$coffeemakker->makeCoffee();

$lattemaker = new LatteMaker();
$lattemaker->makeLatte();

$cappuccinomakker = new CappuccinoMakker();
$cappuccinomakker->makeCappuccino();

$allinonecoffeemaker = new AllInOneCoffeeMaker();
$allinonecoffeemaker->makeCoffee();
$allinonecoffeemaker->makeLatte();
$allinonecoffeemaker->makeCappuccino();
