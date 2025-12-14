<?php
$text = "Full Stack Development with PHP";

echo "Length: " . strlen($text) . "\n";
echo "Word Count: " . str_word_count($text) . "\n";
echo "Reversed: " . strrev($text) . "\n";
echo "Position of 'PHP': " . strpos($text, "PHP") . "\n";
echo "Replaced: " . str_replace("PHP", "JavaScript", $text) . "\n";
?>