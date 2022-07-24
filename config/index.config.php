<?php
// Creating variables
$queryData = array();
$numMsg = '';

$query = mysqli_query($conn, "SELECT * from contact ORDER BY created_at DESC;");
$num_rows = mysqli_num_rows($query);
$numMsg = 'Number of Messages: ' . $num_rows;
