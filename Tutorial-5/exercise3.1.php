<?php
$file = fopen("note.txt", "w");
fwrite($file, "This is the first line.\n");
fwrite($file, "This is the second line.\n");
fclose($file);
echo "File created and written successfully!";
?>