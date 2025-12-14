<?php include 'header.php'; ?>

<?php
function uploadPortfolioFile($file) {
    $allowedTypes = ['pdf', 'jpg', 'png'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception("File upload error: " . $file['error']);
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedTypes)) {
        throw new Exception("Invalid file format. Only PDF, JPG, PNG allowed.");
    }

    if ($file['size'] > $maxSize) {
        throw new Exception("File size exceeds 2MB limit.");
    }

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            throw new Exception("Failed to create uploads directory.");
        }
    }

    // Rename using string functions (e.g., replace spaces with underscores, append timestamp)
    $newName = str_replace(' ', '_', pathinfo($file['name'], PATHINFO_FILENAME));
    $newName .= '_' . time() . '.' . $ext;

    $targetPath = $uploadDir . $newName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception("Failed to move uploaded file.");
    }

    return $newName;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (empty($_FILES['file']['name'])) {
            throw new Exception("No file selected.");
        }

        $uploadedFile = uploadPortfolioFile($_FILES['file']);

        echo "<p>File uploaded successfully: $uploadedFile</p>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<h2>Upload Portfolio File</h2>
<form method="post" enctype="multipart/form-data">
    <label>Select File: <input type="file" name="file" required></label><br>
    <input type="submit" value="Upload">
</form>

<?php include 'footer.php'; ?>