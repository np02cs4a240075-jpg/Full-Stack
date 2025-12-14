<?php
$globalVar = "I am global";

function showWithoutGlobal() {
    echo "Without global: " . @$globalVar . "\n";
}

function showWithGlobal() {
    global $globalVar;
    echo "With global: " . $globalVar . "\n";
}

showWithoutGlobal();
showWithGlobal();
?>