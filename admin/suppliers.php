<?php
include "connect.php";
include "session.php";
$q = mysqli_query($connect, "SELECT * FROM suppliers");
echo "<a href='supplier_add.php'>Add Supplier</a><br><br>";
while ($row = mysqli_fetch_assoc($q)) {
    echo $row['name']." (".$row['contact_email'].") ";
    echo "<a href='supplier_edit.php?id=".$row['id']."'>Edit</a> ";
    echo "<a href='supplier_delete.php?id=".$row['id']."'>Delete</a><br>";
}
echo "<a href='products.php'>Back</a>";
?>
