<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);
mysqli_query($connect, "DELETE FROM products WHERE id=$id");
header("Location: products.php");
exit;
?>
