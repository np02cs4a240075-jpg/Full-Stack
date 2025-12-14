<?php
$file = fopen("note.txt", "r");

while (!feof($file)) {
    $line = fgets($file);
    if ($line !== false) {
        echo $line . "<br>";
    }
}

fclose($file);
?>