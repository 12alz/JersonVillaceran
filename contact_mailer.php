<?php
include "mailer.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Recipient email address
    $to = "santillanbsit@gmail.com";  
    $subject = "New Contact Form Submission";
    
    // Message body
    $body = "You have received a new message from the contact form on your website.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Thank you for contacting us! We'll get back to you soon.</p>";
    } else {
        echo "<p>Sorry, there was an error. Please try again later.</p>";
    }
}
?>
