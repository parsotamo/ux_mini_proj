<?php
// Creating variables
$email = '';
$password = '';
$error_array = array();

// If user has clicked the submit button
if (isset($_POST['submit'])) {

    // Email
    $email = strip_tags($_POST['login_email']);  // Remove html tags 
    $email = trim($email, ' '); // Remove empty spaces at the edges
    $email = strtolower($email); // Lowercase all letters
    $_SESSION['user'] = $email; // Storing email in session

    // Password
    $password = md5($_POST['login_password']);  // Remove html tags 
    // Check if emails are the same
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $query = mysqli_query($conn, "SELECT * from users WHERE email ='$email' AND password='$password';");
    $num_rows = mysqli_num_rows($query);
    if ($num_rows == 1) {
        $queryData = mysqli_fetch_array($query);
        if ($queryData['password'] == $password) {
            Header('Location: index.php');
        } else {
            array_push($error_array, 'Incorrect email or password');
        }
    } else {
        array_push($error_array, 'Incorrect email or password');
    }
}
