<?php
include_once(__DIR__.'/../../include/functions.php');
// General Settings
$sql = "SELECT * FROM general_settings"; // Adjust the table name if different
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$site_name = $row["site_name"];
$site_dec = $row["site_dec"];
$site_phone = $row["phone"];
$site_url = $row["site_url"];
$site_email = $row["email"];
$site_address = $row["address"];
$logo = $row["logo"];
$footer_logo = $row["footer_logo"];
$favicon = $row["favicon"];
$footer_dec = $row["footer_dec"];
$footer_copyright = $row["footer_copyright"];
$siteUrl = $site_url;
$cms_url = $site_url . '/cms/';