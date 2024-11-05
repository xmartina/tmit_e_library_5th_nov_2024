<?php
if (!isset($_SESSION['user_id']) && strpos($_SERVER['REQUEST_URI'], '/cms/login/') === false) {
    header('Location: /cms/login/'); // Redirect to the login page
    exit();
}
$rootDir = '/home/multistream6/domains/thomas.matagram.com/public_html/cms/';