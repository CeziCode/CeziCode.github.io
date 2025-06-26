<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = "emails.txt";
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $subscribed = true;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Subscription Status</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('websitetease.png') no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
    }

    .message-box {
      background: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 10px;
      border: 1px solid #fbb;
      max-width: 400px;
    }

    h1 {
      font-size: 1.6em;
      margin-bottom: 15px;
    }

    p {
      font-size: 1em;
      color: #ddd;
    }

    a {
      color: #fbb;
      text-decoration: none;
      margin-top: 15px;
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="message-box">
    <?php if (!empty($subscribed)): ?>
      <h1>You're In!</h1>
      <p>Thanks for joining our community. Expect exclusive drops, early access, and member-only deals straight to your inbox.</p>
    <?php elseif (!empty($error)): ?>
      <h1>Oops!</h1>
      <p>That email address seems invalid. Please go back and try again.</p>
    <?php endif; ?>
    <a href="opener.html">← Back to homepage</a>
  </div>
</body>
</html>
