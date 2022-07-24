<?php
// Creating variables
$queryData = array();
$numMsg = '';
// Fetching all records from contact table ordered by date
$query = mysqli_query($conn, "SELECT * from contact ORDER BY created_at DESC;");
$num_rows = mysqli_num_rows($query);
$numMsg = 'Number of Messages: ' . $num_rows;
