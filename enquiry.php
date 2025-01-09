<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email
    $to = warhunter2053@gmail.com;  // Replace with your actual email

    // Set the email subject
    $email_subject = "New Enquiry from: $name";

    // Construct the email message
    $email_message = "You have received a new enquiry from your website.\n\n";
    $email_message .= "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_message, $headers)) {
        echo "Thank you for your enquiry. We will get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>