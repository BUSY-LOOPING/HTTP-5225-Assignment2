<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    mysqli_query($connect, "UPDATE categories SET name='$name' WHERE id=$id");
    header("Location: categories.php");
    exit;
}
$q = mysqli_query($connect, "SELECT * FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($q);
?>
<form method="post">
    <input name="name" value="<?php echo $row['name']; ?>">
    <button>Save</button>
</form>
<a href="categories.php">Back</a>
