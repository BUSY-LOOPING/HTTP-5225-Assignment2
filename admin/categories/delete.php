<?php
include('../includes/connect.php');
include('../auth/session.php');
include('functions.php');

$id = intval($_GET['id']);
delete_category($connect, $id);
header("Location: index.php");
exit;
