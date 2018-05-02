<?php

class ShoppingCart
{
    private $items = [];
    private $date = null;

    public function addItem($item){
        array_push($this->items,$item);
    }
    public function getItems(){
        return $this->items;
    }

}


class ShoppingCartItem
{
    public $id = null;
    public $price = null;
    public $quantity = null;
    public $name = null;
}

$cart = new ShoppingCart;

$item = new ShoppingCartItem;
$item->name = "Neptunas";
$item->price = 1.5;
$item->quantity = 1;
$item->id = 1;

$cart->addItem($item);

var_dump($cart->getItems());

//2 uzduotys

echo "<br>";
class Drink
{
    protected $name = null;

    protected function setDrinkName($name){
        $this->name = $name;
}


    public function getDrinkName()
    {
        return $this->name;
    }
}

class Coffee extends Drink
{
    function __construct()
    {

        $this->name = "coffee";
    }
}

$coffee = new Coffee;
echo "My new drink is:".$coffee->getDrinkName();