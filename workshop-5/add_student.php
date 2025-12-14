<?php include 'header.php'; ?>

<?php
function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    $skills = explode(',', $string);
    $skills = array_map('trim', $skills);
    return array_filter($skills, function($skill) { return !empty($skill); });
}

function saveStudent($name, $email, $skillsArray) {
    $data = $name . "|" . $email . "|" . implode(',', $skillsArray) . "\n";
    if (file_put_contents('students.txt', $data, FILE_APPEND) === false) {
        throw new Exception("Failed to save student data.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['skills'])) {
            throw new Exception("All fields are required.");
        }

        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skills = $_POST['skills'];

        if (!validateEmail($email)) {
            throw new Exception("Invalid email address.");
        }

        $skillsArray = cleanSkills($skills);

        if (empty($skillsArray)) {
            throw new Exception("At least one skill is required.");
        }

        saveStudent($name, $email, $skillsArray);

        echo "<p>Student added successfully!</p>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Add Student Info</h2>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Skills (comma-separated): <input type="text" name="skills" required></label><br>
    <input type="submit" value="Add Student">
</form>

<?php include 'footer.php'; ?>