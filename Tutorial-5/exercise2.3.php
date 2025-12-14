<?php

$userInput = "<script>alert('hack');</script> Welcome";

$safeOutput = htmlspecialchars($userInput);
echo "Safe Output: " . $safeOutput . "\n";

$text = "  Hello World  ";
echo "Before Trim: '" . $text . "'\n";
echo "After Trim: '" . trim($text) . "'\n";
?>