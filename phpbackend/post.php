<?php 
class Home 
{
    public function index() :string
    {
        return 'home';
    }
}

$home = new Home();
echo $home->index(); // Echo the return value to display the form
