<?php
include "connect.php";
include "session.php";
if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    mysqli_query($connect, "INSERT INTO categories (name) VALUES ('$name')");
    header("Location: categories.php");
    exit;
}
?>
<form method="post">
    <input name="name" placeholder="Category Name">
    <button>Add Category</button>
</form>
<a href="categories.php">Back</a>
