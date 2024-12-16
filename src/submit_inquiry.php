<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars(trim($_POST['full_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $inquiry = htmlspecialchars(trim($_POST['inquiry']));

    if (!empty($fullName) && !empty($email) && !empty($inquiry)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo "<html lang=\"en\">";
            echo "<head>";
            echo "<meta charset=\"UTF-8\">";
            echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
            echo "<title>Inquiry Submitted</title>";
            echo "<link rel=\"stylesheet\" href=\"styles/index.scss\">";
            echo "<style>";
            echo ".content { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }";
            echo ".content h1 { font-size: 32px; color: #333; text-align: center; margin-bottom: 20px; }";
            echo ".content p { font-size: 18px; line-height: 1.6; color: #555; text-align: center; }";
            echo ".content .back-button { display: block; margin: 20px auto; padding: 10px 20px; background-color: #808080; color: white; text-align: center; text-decoration: none; border-radius: 4px; width: 150px; }";
            echo ".content .back-button:hover { background-color: #575757; }";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "<div class=\"content\">";
            echo "<h1>Thank you, $fullName!</h1>";
            echo "<p>Your inquiry has been received. We will get back to you at <strong>$email</strong> soon.</p>";
            echo "<p><strong>Your Message:</strong> $inquiry</p>";
            echo "<a href=\"index.html\" class=\"back-button\">Go Back to Home</a>";
            echo "</div>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "<html lang=\"en\">";
            echo "<head>";
            echo "<meta charset=\"UTF-8\">";
            echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
            echo "<title>Error</title>";
            echo "<link rel=\"stylesheet\" href=\"styles/index.scss\">";
            echo "<style>";
            echo ".content { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }";
            echo ".content h1 { font-size: 32px; color: #333; text-align: center; margin-bottom: 20px; }";
            echo ".content p { font-size: 18px; line-height: 1.6; color: #555; text-align: center; }";
            echo ".content .back-button { display: block; margin: 20px auto; padding: 10px 20px; background-color: #808080; color: white; text-align: center; text-decoration: none; border-radius: 4px; width: 150px; }";
            echo ".content .back-button:hover { background-color: #575757; }";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "<div class=\"content\">";
            echo "<h1>Error</h1>";
            echo "<p>Invalid email address. Please go back and try again.</p>";
            echo "<a href=\"index.html\" class=\"back-button\">Go Back to Home</a>";
            echo "</div>";
            echo "</body>";
            echo "</html>";
        }
    } else {
        echo "<html lang=\"en\">";
        echo "<head>";
        echo "<meta charset=\"UTF-8\">";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "<title>Error</title>";
        echo "<link rel=\"stylesheet\" href=\"styles/index.scss\">";
        echo "<style>";
        echo ".content { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }";
        echo ".content h1 { font-size: 32px; color: #333; text-align: center; margin-bottom: 20px; }";
        echo ".content p { font-size: 18px; line-height: 1.6; color: #555; text-align: center; }";
        echo ".content .back-button { display: block; margin: 20px auto; padding: 10px 20px; background-color: #808080; color: white; text-align: center; text-decoration: none; border-radius: 4px; width: 150px; }";
        echo ".content .back-button:hover { background-color: #575757; }";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class=\"content\">";
        echo "<h1>Error</h1>";
        echo "<p>All fields are required. Please go back and complete the form.</p>";
        echo "<a href=\"index.html\" class=\"back-button\">Go Back to Home</a>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
} else {
    header('Location: contact.html');
    exit;
}
?>
