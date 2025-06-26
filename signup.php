<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = "emails.txt"; // file to save emails
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
    }

    // Optionally redirect back to the homepage or show a success message
    header("Location: index.html");
    exit();
}
?>
