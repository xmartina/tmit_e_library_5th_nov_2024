<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$landing_servername = "localhost"; // Change this if your database is hosted on a different server
$landing_username = "matagram_tmit_landing_page"; // Change this to your database username
$landing_password = "tmit_landing_page"; // Your database password
$landing_dbname = "matagram_tmit_landing_page"; // Your database name

// Create connection
$landing_conn = new mysqli($landing_servername, $landing_username, $landing_password, $landing_dbname);

// Check connection
if ($landing_conn->connect_error) {
    die("Connection failed: " . $landing_conn->connect_error);
}
