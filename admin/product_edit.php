<?php
include "connect.php";
include "session.php";
$id = intval($_GET['id']);

if ($_POST) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $supplier_id = intval($_POST['supplier_id']);
    $stock = intval($_POST['stock']);
    mysqli_query($connect, "UPDATE products SET name='$name', description='$description', price=$price,
        category_id=$category_id, supplier_id=$supplier_id, stock=$stock WHERE id=$id");
    header("Location: products.php");
    exit;
}

$q = mysqli_query($connect, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($q);
$catq = mysqli_query($connect, "SELECT * FROM categories");
$suppq = mysqli_query($connect, "SELECT * FROM suppliers");
?>
<form method="post">
    <input name="name" value="<?php echo $row['name']; ?>"><br>
    <textarea name="description"><?php echo $row['description']; ?></textarea><br>
    <input name="price" type="number" step="0.01" value="<?php echo $row['price']; ?>"><br>
    <select name="category_id">
        <?php while($cat = mysqli_fetch_assoc($catq)) {
            $sel = $row['category_id']==$cat['id'] ? "selected" : "";
            echo "<option value='".$cat['id']."' $sel>".$cat['name']."</option>";
        } ?>
    </select><br>
    <select name="supplier_id">
        <?php while($supp = mysqli_fetch_assoc($suppq)) {
            $sel = $row['supplier_id']==$supp['id'] ? "selected" : "";
            echo "<option value='".$supp['id']."' $sel>".$supp['name']."</option>";
        } ?>
    </select><br>
    <input name="stock" type="number" value="<?php echo $row['stock']; ?>"><br>
    <button>Save</button>
</form>
<a href="products.php">Back</a>
