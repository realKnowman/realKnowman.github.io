<?php
  // The receiving email address
  $receiving_email_address = 'rasoolnouman10@gmail.com';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Sanitize inputs
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Prepare email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Use HTML content for better formatting

    // Prepare the email body
    $body = "<h2>Message from: $name</h2>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Subject:</strong> $subject</p>";
    $body .= "<p><strong>Message:</strong><br/>" . nl2br($message) . "</p>";

    // Send the email
    if (mail($receiving_email_address, $subject, $body, $headers)) {
      echo "Message sent successfully!";
    } else {
      echo "Failed to send message.";
    }
  }
?>
