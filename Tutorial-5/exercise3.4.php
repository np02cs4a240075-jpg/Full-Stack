<?php
$file = fopen("note.txt", "a");
fwrite($file, "Appended via PHP tutorial.\n");
fclose($file);

$file = fopen("note.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    if ($line !== false) {
        echo $line . "<br>";
    }
}
fclose($file);
?>