<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);
mysqli_query($connect, "DELETE FROM categories WHERE id=$id");
header("Location: categories.php");
exit;
?>
