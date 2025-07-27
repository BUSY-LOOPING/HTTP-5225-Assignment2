<?php
session_start();
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) != "index.php") {
    header("Location: index.php");
    exit;
}
?>
