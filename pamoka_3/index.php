<?php 
$months = ["June","July","October","December","March"];
echo "<h2>My months:</h2>";
echo "<ol>";
$i = 0;
 while($i < sizeof($months)):
    
    echo'<li>'.$months[$i].'</li>';
    
    $i++;
 endwhile;
echo "</ol>";
////////

$shopping_cart = [
    [
        'type' => 'vegetables',
        'name' => 'potato',
        'quantity' => '10',
        'price' => '1.0'
    ],
    [
        'type' => 'vegetables',
        'name' => 'onion',
        'quantity' => '5',
        'price' => '0.5'
    ],
    [
        'type' => 'vegetables',
        'name' => 'cucumber',
        'quantity' => '2',
        'price' => '1.2'
    ],
     [
        'type' => 'fruits',
        'name' => 'banana',
        'quantity' => '2',
        'price' => '1.0'
     ],
     [
        'type' => 'fruits',
        'name' => 'apple',
        'quantity' => '3',
        'price' => '1.2'
     ]
];


echo "<h2>Fruits :</h2> <br>";
foreach($shopping_cart as $index => $value){
    foreach($value as $property =>$val){
        
if($val === 'fruits'):
    $shop = $shopping_cart[$index];
    echo $shop['name']."<br> Price :".$shop['quantity']*$shop['price']."<br>";
endif;
        
    }
}

echo "<h2>Vegetables :</h2><br>";
foreach($shopping_cart as $index => $value){
    foreach($value as $property =>$val){
        
if($val === 'vegetables'):
    $shop = $shopping_cart[$index];
    echo $shop['name']."<br> Price :".$shop['quantity']*$shop['price']."<br>";
endif;
        
    }
}


//////////////////////////////////////

echo "<h2>Check array:</h2>";

$letters = ['a', 'b', 'c', 'd', 'f'];
$numbers = [];

function myArray($a){
    if(!$a):
        echo "Array is empty";
    else: 
        for($i = 0; $i < sizeof($a); $i++):
            echo $a[$i];
        endfor;
    endif;
}

myArray($letters);