<?php

// Creating variables
$fname = '';
$lname = '';
$email1 = '';
$email2 = '';
$password1 = '';
$password2 = '';
$date = '';
$error_array = array();
$error_array['fname'] = array();
$error_array['lname'] = array();
$error_array['email'] = array();
$error_array['password'] = array();

// If user has clicked the submit button
if (isset($_POST['submit'])) {

    // First Name
    $fname = strip_tags($_POST['reg_fname']);  // Remove html tags 
    $fname = trim($fname, ' '); // Remove empty spaces at the edges
    $fname = ucfirst(strtolower($fname)); // Capitalize the first letter
    $_SESSION['reg_fname'] = $fname; // Storing first name in session

    // Last Name
    $lname = strip_tags($_POST['reg_lname']);  // Remove html tags 
    $lname = trim($lname, ' '); // Remove empty spaces at the edges
    $lname = ucfirst(strtolower($lname)); // Capitalize the first letter
    $_SESSION['reg_lname'] = $lname; // Storing last name in session

    // Email
    $email1 = strip_tags($_POST['reg_email1']);  // Remove html tags 
    $email1 = trim($email1, ' '); // Remove empty spaces at the edges
    $email1 = strtolower($email1); // Lowercase all letters
    $_SESSION['reg_email1'] = $email1; // Storing email in session

    // Email Confirmation
    $email2 = strip_tags($_POST['reg_email2']);  // Remove html tags 
    $email2 = trim($email2, ' '); // Remove empty spaces at the edges
    $email2 = strtolower($email2); // Lowercase all letters
    $_SESSION['reg_email2'] = $email2; // Storing email confirm in session

    // Password
    $password1 = strip_tags($_POST['reg_password1']);  // Remove html tags 
    // Password Confirmation
    $password2 = strip_tags($_POST['reg_password2']);  // Remove html tags 
    // Date
    $date = date('Y-m-d');


    // Check length of lastname
    if (strlen($fname) >= 3 && strlen($fname) <= 30) {
        if (preg_match('/^(?=.*[0-9])/', $fname) || preg_match('/(?=.*[#$@!%&*?])/', $fname)) {
            $error_array['fname']['ivname'] =  'Invalid name!';
        }
    } else {
        $error_array['fname']['ivlen'] = 'Invalid length. Length is between 3 to 30 characters';
    }

    // Check length of firstname
    if (strlen($lname) >= 3 && strlen($lname) <= 25) {
        if (preg_match('/^(?=.*[0-9])/', $lname) || preg_match('/(?=.*[#$@!%&*?])/', $lname)) {
            $error_array['lname']['ivname'] = 'Invalid name!';
        }
    } else {
        $error_array['lname']['ivlen'] = 'Invalid length. Length is between 3 to 25 characters';
    }

    // Check if emails are the same
    if ($email1 == $email2) {
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            $email1 = filter_var($email1, FILTER_VALIDATE_EMAIL);
            $queryEmail = mysqli_query($conn, "SELECT email from users WHERE email ='$email1';");
            $num_rows = mysqli_num_rows($queryEmail);
            if ($num_rows > 0) {
                $error_array['email']['taken'] = 'This email is already in use';
            }
        } else {
            $error_array['email']['ivemail'] = 'Invalid email';
        }
    } else {
        $error_array['email']['dmatch'] = 'Emails don\'t match';
    }
    // Validating password
    if ($password1 == $password2) {
        if (preg_match('/[A-Za-z\d#$@!%&*?]{8,30}/', $password1)) {
            if (!preg_match('/(?=.*[a-z])/', $password1)) {
                $error_array['password']['lw'] = 'Must contain at least one lowercase character';
            }
            if (!preg_match('/(?=.*[A-Z])/', $password1)) {
                $error_array['password']['up'] = 'Must contain at least one uppercase character';
            }
            if (!preg_match('/(?=.*[#$@!%&*?])/', $password1)) {
                $error_array['password']['sp'] = 'Must contain at least one special character';
            }
        } else {
            $error_array['password']['ivlen'] = 'Password length must be between 8 to 30 characters';
        }
    } else {
        $error_array['password']['dmatch'] = "Passwords don't match";
    }
    if (empty($error_array['fname']) && empty($error_array['lname']) && empty($error_array['email']) && empty($error_array['fname'])) {
        $password = md5($password1);
        // Inserting record to users table
        $create_user  = mysqli_query($conn, "INSERT INTO users(first_name, last_name, email, password, created_at) VALUES ('$fname', '$lname', '$email1', '$password', '$date')");

        $_SESSION['reg_fname'] = '';
        $_SESSION['reg_lname'] = '';
        $_SESSION['reg_email1'] = '';
        $_SESSION['reg_email2'] = '';
    }
}
