<?php
include "connect.php";
include "auth/session.php";
include('functions.php');
$id = intval($_GET['id']);
if ($_POST) {
    $name = $_POST['name'];
    $contact_email = $_POST['contact_email'];
    update_supplier($connect, $id, $name, $contact_email);
    header("Location: suppliers.php");
    exit;
}
$supplier = get_supplier_by_id($connect, $id);
?>
<form method="post">
    <input name="name" value="<?php echo $supplier['name']; ?>"><br>
    <input name="contact_email" value="<?php echo $supplier['contact_email']; ?>"><br>
    <button>Save</button>
</form>
<a href="suppliers.php">Back</a>