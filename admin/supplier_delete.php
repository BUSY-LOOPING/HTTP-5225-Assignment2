<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);
mysqli_query($connect, "DELETE FROM suppliers WHERE id=$id");
header("Location: suppliers.php");
exit;
?>
