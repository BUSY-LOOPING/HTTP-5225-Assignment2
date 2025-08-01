<?php
session_start();


$current_page = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['user_id']) && $current_page != "index.php") {
    
    header("Location: index.php");
    exit;
}
?>
