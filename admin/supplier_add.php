<?php
include "connect.php";
include "session.php";
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $contact_email = mysqli_real_escape_string($connect, $_POST['contact_email']);
    mysqli_query($connect, "INSERT INTO suppliers (name, contact_email) VALUES ('$name', '$contact_email')");
    header("Location: suppliers.php");
    exit;
}
?>
<form method="post">
    <input name="name" placeholder="Supplier Name"><br>
    <input name="contact_email" placeholder="Contact Email"><br>
    <button>Add Supplier</button>
</form>
<a href="suppliers.php">Back</a>
