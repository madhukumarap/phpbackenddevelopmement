<?php 
// namespace src;
class Invoice implements Stringable
{
    protected array $data = [];
    private float $amount1;
    
    public function __get(string $name){
        if(array_key_exists($name, $this->data)){
            return $this->data;
        }
    }
    public function __set(string $name, $value):void 
    {
        $this->data[$name] = $value;
    }
    public function __isset($name):bool //isset method call on empty or undefine un accessable property get called function undefined on property
    {
        return array_key_exists($name, $this->data);
    }
    public function __unset($name)   //to remove the element from array
    {
         unset($this->data[$name]);
    }

    // he __call() method is a magic method in PHP that is automatically invoked when an inaccessible or non-existing method is called on an object. It provides a mechanism for dynamic method dispatch, allowing developers to handle method calls that are not explicitly defined within the class
    public function __call(string $name,  array $args)
    {
        var_dump($name, $args);  
    }
    public static function __callStatic(string $name, array $args)
    {
        var_dump('static',$name, $args);
    }
    public function __tostring(): string 
    {
        return json_encode($this->data);
    }
    public function __invoke()
    {
        var_dump('invoke'); // this help help single access classs
    }
    public function __debugInfo(): ?array
    {
        return []; // it will help in private data
    }
}
$invoice = new Invoice();
$invoice->name = 'John Doe';
$invoice->madhu(1,2,3,4,);
var_dump($invoice);
// var_dump(isset($invoice->name));
// unset($invoice->name);
// var_dump(isset($invoice->name));

// var_dump($invoice  instanceof Stringable);
$invoice();