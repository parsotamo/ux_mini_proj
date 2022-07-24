<?php

// Creating variables
$name = '';
$email = '';
$message = '';
$error_array = array();
$error_array['name'] = array();
$error_array['email'] = array();
$error_array['message'] = array();

// If user has clicked the submit button
if (isset($_POST['submit'])) {
    // Name
    $name = strip_tags($_POST['ctc_name']);  // Remove html tags 
    $name = trim($name, ' '); // Remove empty spaces at the edges
    $name = ucfirst(strtolower($name)); // Capitalize the first letter
    $_SESSION['ctc_name'] = $name; // Storing first name in session


    // Email
    $email = strip_tags($_POST['ctc_email']);  // Remove html tags 
    $email = trim($email, ' '); // Remove empty spaces at the edges
    $email = strtolower($email); // Lowercase all letters
    $_SESSION['ctc_email'] = $email; // Storing email in session

    // Message
    $message = strip_tags($_POST['ctc_message']);  // Remove html tags 
    $message = trim($message, ' '); // Remove empty spaces at the edges
    $_SESSION['ctc_message'] = $message; // Storing first name in session

    // Check length of Name
    if (strlen($name) >= 3 && strlen($name) <= 50) {
        if (preg_match('/^(?=.*[0-9])/', $name) || preg_match('/(?=.*[#$@!%&*?])/', $name)) {
            $error_array['name']['ivname'] = 'Invalid name!';
        }
    } else {
        $error_array['name']['ivlen'] = 'Invalid length. Length is between 3 to 50 characters';
    }

    // Validating email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    } else {
        $error_array['email']['ivemail'] = 'Invalid email';
    }
    $timestamp = date('Y-m-d H:i:s');
    if (empty($error_array['name']) && empty($error_array['email']) && empty($error_array['message'])) {
        // Inserting record to contact table
        $send_message  = mysqli_query($conn, "INSERT INTO contact(name, email, message, created_at) VALUES ('$name', '$email', '$message', '$timestamp')");
        $_SESSION['ctc_name'] = '';
        $_SESSION['ctc_email'] = '';
        $_SESSION['ctc_message'] = '';
        // Redirecting to index page
        Header('Location: index.php');
    }
}
