<?php
include "../includes/connect.php";
include "../auth/session.php";
include('functions.php');
include('../categories/functions.php');
include('../suppliers/functions.php');
$id = intval($_GET['id']);

if ($_POST) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $supplier_id = intval($_POST['supplier_id']);
    $stock = intval($_POST['stock']);
    update_product($connect, $id, $name, $description, $price, $category_id, $supplier_id, $stock);
    header("Location: index.php");
    exit;
}

$q = mysqli_query($connect, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($q);
$categories = get_categories($connect);
$suppliers = get_suppliers($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>
        <form method="post" class="mb-3">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" id="price" type="number" step="0.01" class="form-control" value="<?php echo $row['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <?php while ($cat = mysqli_fetch_assoc($categories)) {
                        $sel = $row['category_id'] == $cat['id'] ? "selected" : "";
                        echo "<option value='" . $cat['id'] . "' $sel>" . $cat['name'] . "</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select" required>
                    <?php while ($supp = mysqli_fetch_assoc($suppliers)) {
                        $sel = $row['supplier_id'] == $supp['id'] ? "selected" : "";
                        echo "<option value='" . $supp['id'] . "' $sel>" . $supp['name'] . "</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input name="stock" id="stock" type="number" class="form-control" value="<?php echo $row['stock']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>