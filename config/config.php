<?php 

ob_start(); 

// Starting a session
session_start();
// Connecting to database
$conn = mysqli_connect('localhost', 'root', 'root', 'social');

// If there's any error connecting to database it should echo it out
if (mysqli_connect_errno()) {
    echo 'Failed to connect to database ' . mysqli_connect_errno();
}
