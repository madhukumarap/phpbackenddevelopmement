<?php 

declare(strict_types=1);
// require '/vendor/autoload.php';
use phpbackend\Router; 
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function test_that_it_registers_a_route(): void
    {
        $router = new Router();

        $router->register('get', ['Users', 'index'], function() {
            return 'Test route';
        });
        $expected= [
            'get' => [
                ['Users', 'index'] => function() {
                    return 'Test route';
                }
            ]
        
        ];
        $this->assertEquals($expected,$router->routes());
    }   
}
