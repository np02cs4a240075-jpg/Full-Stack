<?php
$fruits = "apple,banana,grape,orange";
$fruitArray = explode(",", $fruits);

foreach ($fruitArray as $fruit) {
    echo $fruit . "\n";
}

echo "\nJoined: " . implode(" | ", $fruitArray);
?>