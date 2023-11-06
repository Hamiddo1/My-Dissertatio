<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $message1 = $_POST["message1"];
    $message2 = $_POST["message2"];
    $message3 = $_POST["message3"];
    $message4 = $_POST["message4"];

    // Compose the email message
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "Feedback Form Submission";
    $headers = "From: admin@metaxplora.com"; // Replace with your email address or any desired sender name
    $message_body = "1. HAVE YOU LEARNED NEW PASSWORD SECURITY PRACTICES FROM OUR WEBSITE THAT YOU WERE UNAWARE OF BEFORE? $message1\n";
    $message_body .= "2. WHICH SPECIFIC TOOL OR INFORMATION ON OUR WEBSITE DID YOU FIND MOST HELPFUL FOR IMPROVING YOUR MOBILE BANKING PASSWORD SECURITY? $message2\n";
    $message_body .= "3. DO YOU FEEL CONFIDENT ABOUT YOUR MOBILE BANKING PASSWORD SECURITY AFTER USING OUR WEBSITE? $message3\n";
    $message_body .= "4. HAVE YOU IMPLEMENTED ANY CHANGES TO YOUR MOBILE BANKING PASSWORDS BASED ON THE KNOWLEDGE GAINED FROM OUR WEBSITE? $message4";

    // Send the email
    if (mail($to, $subject, $message_body, $headers)) {
        // Redirect to the thank you page on success
        header("Location: https://pasbb.com"); // Replace with your desired thank you page
        exit(); // Ensure that no more code is executed after the redirect
    } else {
        echo "<p>Failed to send the message. Please try again later.</p>";
    }
}
?>
