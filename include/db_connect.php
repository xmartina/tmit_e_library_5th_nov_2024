<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "matagram_e_library_tmit"; // Change this to your database username
$password = "e_library_tmit"; // Your database password
$dbname = "matagram_e_library_tmit"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
