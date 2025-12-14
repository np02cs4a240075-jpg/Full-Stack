<?php include 'header.php'; ?>

<h2>View Students</h2>

<?php
if (file_exists('students.txt')) {
    $lines = file('students.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!empty($lines)) {
        echo "<ul>";
        foreach ($lines as $line) {
            [$name, $email, $skillsStr] = explode('|', $line, 3);
            $skillsArray = explode(',', $skillsStr);
            
            echo "<li>";
            echo "<strong>Name:</strong> $name<br>";
            echo "<strong>Email:</strong> $email<br>";
            echo "<strong>Skills:</strong> " . implode(', ', $skillsArray);
            echo "</li><br>";
        }
        echo "</ul>";
    } else {
        echo "<p>No students found.</p>";
    }
} else {
    echo "<p>No students file found.</p>";
}
?>

<?php include 'footer.php'; ?>