<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $contact_email = mysqli_real_escape_string($connect, $_POST['contact_email']);
    mysqli_query($connect, "UPDATE suppliers SET name='$name', contact_email='$contact_email' WHERE id=$id");
    header("Location: suppliers.php");
    exit;
}
$q = mysqli_query($connect, "SELECT * FROM suppliers WHERE id=$id");
$row = mysqli_fetch_assoc($q);
?>
<form method="post">
    <input name="name" value="<?php echo $row['name']; ?>"><br>
    <input name="contact_email" value="<?php echo $row['contact_email']; ?>"><br>
    <button>Save</button>
</form>
<a href="suppliers.php">Back</a>
