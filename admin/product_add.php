<?php
include "connect.php";
include "session.php";

if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $supplier_id = intval($_POST['supplier_id']);
    $stock = intval($_POST['stock']);
    mysqli_query($connect, "INSERT INTO products (name, description, price, category_id, supplier_id, stock)
        VALUES ('$name', '$description', $price, $category_id, $supplier_id, $stock)");
    header("Location: products.php");
    exit;
}

$catq = mysqli_query($connect, "SELECT * FROM categories");
$suppq = mysqli_query($connect, "SELECT * FROM suppliers");
?>
<form method="post">
    <input name="name" placeholder="Product Name"><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input name="price" placeholder="Price" type="number" step="0.01"><br>
    <select name="category_id">
        <option value="">Category</option>
        <?php while($cat = mysqli_fetch_assoc($catq)) {
            echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
        } ?>
    </select><br>
    <select name="supplier_id">
        <option value="">Supplier</option>
        <?php while($supp = mysqli_fetch_assoc($suppq)) {
            echo "<option value='".$supp['id']."'>".$supp['name']."</option>";
        } ?>
    </select><br>
    <input name="stock" placeholder="Stock" type="number"><br>
    <button>Add Product</button>
</form>
<a href="products.php">Back</a>
