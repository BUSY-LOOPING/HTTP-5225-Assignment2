<?php
include "connect.php"; include "session.php";
$q = mysqli_query($connect, "
    SELECT products.id, products.name, products.price, products.stock, categories.name as category, suppliers.name as supplier
    FROM products
    LEFT JOIN categories ON products.category_id=categories.id
    LEFT JOIN suppliers ON products.supplier_id=suppliers.id
    ORDER BY products.name
");
echo "<a href='product_add.php'>Add Product</a> | <a href='logout.php'>Logout</a><br><br>";
while ($row = mysqli_fetch_assoc($q)) {
    echo $row['name']." ($".$row['price'].") - ".$row['category']." / ".$row['supplier']." - Stock: ".$row['stock']." ";
    echo "<a href='product_edit.php?id=".$row['id']."'>Edit</a> ";
    echo "<a href='product_delete.php?id=".$row['id']."'>Delete</a><br>";
}
?>
