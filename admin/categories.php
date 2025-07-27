<?php
include "connect.php";
include "session.php";
$q = mysqli_query($connect, "SELECT * FROM categories");
echo "<a href='category_add.php'>Add Category</a><br><br>";
while ($row = mysqli_fetch_assoc($q)) {
    echo $row['name']." ";
    echo "<a href='category_edit.php?id=".$row['id']."'>Edit</a> ";
    echo "<a href='category_delete.php?id=".$row['id']."'>Delete</a><br>";
}
echo "<a href='products.php'>Back</a>";
?>
